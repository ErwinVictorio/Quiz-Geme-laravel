<!-- resources/views/playground.blade.php -->
<x-layouts.app>
    <div class="container py-4">
        <h2 class="fw-bold mb-3" style="color:#8B2D2D;">🧪 Playground</h2>

        <!-- editor container -->
        <div id="editor" style="height: 500px; border:1px solid #eee; border-radius: 12px; overflow: hidden;"></div>

        <div class="mt-3 d-flex gap-2">
            <button id="btnRun" class="btn btn-primary">Run</button>
            <button id="btnCopy" class="btn btn-outline-secondary">Copy</button>
        </div>

        <!-- output -->
        <pre id="output" class="mt-3 p-3" style="background:#0f172a; color:#e2e8f0; border-radius:12px; min-height:120px; white-space:pre-wrap;"></pre>
    </div>

    <!-- CSRF token for POST -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Monaco via CDN -->
    <script>
        window.require = { paths: { 'vs': 'https://cdn.jsdelivr.net/npm/monaco-editor@0.45.0/min/vs' } };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/monaco-editor@0.45.0/min/vs/loader.js"></script>

    <script>
        let editor;

        require(['vs/editor/editor.main'], function () {
            editor = monaco.editor.create(document.getElementById('editor'), {
                value: `using System;

class Program {
    static void Main() {
        Console.WriteLine("Hello from Playground!");
    }
}`,
                language: 'csharp',    // you can switch to 'javascript', 'php', etc.
                theme: 'vs',
                automaticLayout: true,
                fontSize: 14,
                minimap: { enabled: false }
            });
        });

        const outEl  = document.getElementById('output');
        const btnRun = document.getElementById('btnRun');
        const btnCopy= document.getElementById('btnCopy');

        function setOutput(text) {
            outEl.textContent = text;
        }

        btnCopy.addEventListener('click', async () => {
            await navigator.clipboard.writeText(editor.getValue());
            setOutput('Code copied to clipboard.');
        });

        btnRun.addEventListener('click', async () => {
            setOutput('Running...');
            const source = editor.getValue();

            try {
                const res = await fetch('{{ route('playground.run') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        source: source,
                        language_id: 51, // C# (.NET) in Judge0 CE
                        stdin: ''        // optional input
                    })
                });

                const data = await res.json();

                // Judge0 response fields: stdout, stderr, compile_output, status.description
                const parts = [
                    data.status?.description ? `Status: ${data.status.description}` : '',
                    data.compile_output ? `\nCompile:\n${data.compile_output}` : '',
                    data.stdout ? `\nOutput:\n${data.stdout}` : '',
                    data.stderr ? `\nError:\n${data.stderr}` : '',
                ].filter(Boolean);

                setOutput(parts.join('\n'));
            } catch (e) {
                setOutput('Request failed. Please try again.');
                console.error(e);
            }
        });
    </script>
</x-layouts.app>
