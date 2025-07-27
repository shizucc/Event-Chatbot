<div>
    {{-- ✅ Feedback simpan --}}
    @if (session()->has('success'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <span class="alert-text" style="color: white">✅ {{ session('success') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text" style="color: white">⚠️ {{ session('error') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- Alert info drawflow --}}
    <div id="flow-warning-alert" class="alert alert-warning alert-dismissible fade show" style="display: none"
        role="alert">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text" id="flow-warning-text"><strong>Warning!</strong> This is a warning alert—check it
            out!</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    {{-- Area Sidebar --}}
    <div id="flow-checklist" class="mb-3">
        <h5>Checklist Flow</h5>
        <ul>
            <li id="check-start"><span>❌</span> Terdapat Start Node</li>
            <li id="check-end"><span>❌</span> Terdapat End Node</li>
            <li id="check-input-start"><span>❌</span> Terdapat Input Start</li>
            <li id="check-input-end"><span>❌</span> Terdapat Input End</li>
            <li id="check-input-name"><span>❌</span> Terdapat Input_name</li>
            <li id="check-connected"><span>❌</span> Semua node terhubung</li>
        </ul>
    </div>



    <div class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
        <div id="sidebar" style="width: 200px; background: #333; color: #fff; padding: 20px;">
            <h5 style="color: #fff;">Nodes</h5>
            @foreach ($nodes as $node)
                <div class="node-item" draggable="true" data-node="{{ $node->code }}">
                    {{ $node->label }}
                </div>
            @endforeach
        </div>

        {{-- Area Drawflow --}}
        <div id="drawflow-wrapper" wire:ignore
            style="flex: 1; height: 600px; border: 1px solid #ccc; position: relative;">
            <button id="saveFlowBtn" class="btn btn-primary">Simpan Flow</button>
            <div id="drawflow" style="width: 100%; height: 100%;"></div>
        </div>

    </div>

    {{-- Drawflow CSS --}}
    <link rel="stylesheet" href="{{ asset('vendor/drawflow/drawflow.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/events/flow.css') }}">

    {{-- Drawflow JS --}}
    <script src="{{ asset('vendor/drawflow/drawflow.min.js') }}"></script>

    <script src="{{ asset('js/admin/event/flow.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            initDrawflow();
            const flowJson = JSON.parse(@json($event->form_flow));
            editor.import(flowJson);
        });
        window.nodeRules = @json($nodes->mapWithKeys(fn($n) => [
            $n->code => [
                'input' => $n->rule_input ?? [],
                'output' => $n->rule_output ?? []
            ]
        ]));
    </script>


</div>