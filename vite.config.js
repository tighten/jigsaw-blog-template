import { spawn } from 'child_process';
import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue2'

function jigsaw() {
    spawn('vendor/bin/jigsaw', ['build', 'local', '-q'], { stdio: 'inherit' });
}

export default defineConfig(({ command }) => ({
    // This might be unnecessary
    base: command === 'build' ? '/assets/build/' : '/', // https://vitejs.dev/guide/build.html#public-base-path
    publicDir: 'source/assets', // served at / in dev, copied to root of outDir in build
    // assetsInclude: ['**/*.gltf'], // https://vitejs.dev/config/#assetsinclude
    build: {
        manifest: true,
        outDir: 'source/assets/build',
        rollupOptions: {
            input: 'source/_assets/js/main.js',
        },
    },
    server: {
        watch: {
            ignored: ['**/build_local/**', '**/cache/**'],
        },
    },
    plugins: [
        vue(),
        {
            name: 'jigsaw:serve',
            apply: 'serve',
            buildStart() {
                console.log('buildStart');
                jigsaw();
            },
            handleHotUpdate({ file, server }) {
                console.log('handleHotUpdate');
                if (file.endsWith('.php') || file.endsWith('.md')) {
                    console.log(file);
                    jigsaw();
                    server.ws.send({ type: 'full-reload', path: '*' });
                    return [];
                }
            },
        },
        {
            name: 'jigsaw:build',
            apply: 'build',
            async writeBundle() {
                console.log('writeBundle')
                await jigsaw();
            },
        },
    ],
}));
