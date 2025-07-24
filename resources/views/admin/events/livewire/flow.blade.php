<div>
    <div class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
        <div id="drawflow" style="width:100%;height:400px;border:1px solid #ccc"></div>
    </div>

    <script src="{{ asset('vendor/drawflow/drawflow.min.js') }}"></script>
    <script>
        function initDrawflow() {
            const container = document.getElementById("drawflow");
            if (!container) return;
            container.innerHTML = '';
            const editor = new Drawflow(container);
            editor.reroute = true;
            editor.start();
            editor.addNode(
                'example', 1, 1, 100, 100, 'example', {}, '<div>Example Node</div>'
            );
        }

        // Inisialisasi saat komponen pertama kali di-mount
        document.addEventListener('livewire:initialized', function () {
            initDrawflow();
        });

        // Inisialisasi ulang setiap kali komponen di-update (misal: tab berpindah)
        document.addEventListener('livewire:updated', function () {
            initDrawflow();
        });
    </script>
</div>