import { exec, spawn } from 'child_process';
import { createLogger, defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue2'

const log = createLogger(undefined, { prefix: '[jigsaw]' });

function jigsaw() {
    const jigsaw = spawn('vendor/bin/jigsaw', ['build', 'local', '-q']);
    const lines = (data) => String(data).trim().split('\n');
    jigsaw.stdout.on('data', (data) => lines(data).map((line) => log.info(line, { timestamp: true })));
    jigsaw.stderr.on('data', (data) => lines(data).map((line) => log.error(line, { timestamp: true })));
    jigsaw.on('close', (code) => log.info(`Jigsaw build finished with exit code ${code}.`, { timestamp: true }));
}

export default defineConfig(({ command }) => ({
    // Served at / in dev, copied to root of outDir in build
    publicDir: 'source/assets',
    build: {
        outDir: 'source/assets/build',
        manifest: true,
        // Our static assets are already right where we want them
        copyPublicDir: false,
        rollupOptions: {
            input: 'source/_assets/js/main.js',
        },
    },
    server: {
        watch: {
            // Don't hot-reload when output or cache files change
            ignored: ['**/build_local/**', '**/cache/**'],
        },
    },
    plugins: [
        vue(),
        {
            name: 'jigsaw:serve',
            apply: 'serve',
            // Build the Jigsaw site once initially
            buildStart: jigsaw,
            // Rebuild when any PHP or Markdown files change
            handleHotUpdate({ file, server }) {
                if (file.endsWith('.php') || file.endsWith('.md')) {
                    log.info(`Updating (${file.replace(`${__dirname}/`, '')})`, { timestamp: true });
                    jigsaw();
                    server.ws.send({ type: 'full-reload', path: '*' });
                    return [];
                }
            },
        },
        {
            name: 'jigsaw:build',
            apply: 'build',
            writeBundle: jigsaw,
        },
    ],
}));
