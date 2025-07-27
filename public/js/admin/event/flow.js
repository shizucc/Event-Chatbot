let editor;

function initDrawflow() {
  console.log('Initializing Drawflow');

  const container = document.getElementById("drawflow");
  if (!container) return;

  if (window.editor) {
    console.log('Drawflow already initialized');
    return;
  }

  editor = new Drawflow(container);
  window.editor = editor; // global
  editor.reroute = true;
  editor.start();

  // Rules & drag-drop
  container.addEventListener("drop", drop, false);
  container.addEventListener("dragover", allowDrop, false);
  document.querySelectorAll('.node-item').forEach(item => {
    item.addEventListener("dragstart", drag, false);
  });

  console.log('Drawflow initialized');

  // Connection rules...
  editor.on('connectionCreated', function (connection) {
    const outputNode = connection.output_id;
    const inputNode = connection.input_id;

    const outputData = editor.getNodeFromId(outputNode);
    const inputData = editor.getNodeFromId(inputNode);

    const outputName = outputData.name;
    const inputName = inputData.name;

    // Ambil rule dari window.nodeRules
    const inputRule = window.nodeRules?.[inputName]?.input || null;
    const outputRule = window.nodeRules?.[outputName]?.output || null;

    // Validasi input
    if (inputRule && !inputRule.includes(outputName)) {
      showFlowWarning(`Sambungan ditolak: ${inputName} hanya boleh dari ${(Array.isArray(inputRule) ? inputRule.join(', ') : inputRule)}`);
      editor.removeSingleConnection(connection.output_id, connection.input_id);
      return;
    }

    // Validasi output
    if (outputRule && !outputRule.includes(inputName)) {
      showFlowWarning(`Sambungan ditolak: ${outputName} hanya boleh ke ${(Array.isArray(outputRule) ? outputRule.join(', ') : outputRule)}`);
      editor.removeSingleConnection(connection.output_id, connection.input_id);
      return;
    }

    showFlowWarning('Connection OK');
  });

    // Panggil setiap ada perubahan flow
  editor.on('nodeCreated', updateFlowChecklist);
  editor.on('nodeRemoved', updateFlowChecklist);
  editor.on('connectionCreated', updateFlowChecklist);
  editor.on('connectionRemoved', updateFlowChecklist);
}

function allowDrop(ev) { ev.preventDefault(); }
function drag(ev) { ev.dataTransfer.setData("node", ev.target.getAttribute("data-node")); }
function drop(ev) {
  ev.preventDefault();
  const nodeName = ev.dataTransfer.getData("node");
  const container = document.getElementById("drawflow");
  const posX = ev.clientX - container.getBoundingClientRect().x;
  const posY = ev.clientY - container.getBoundingClientRect().y;
  let html = `<div style="padding:5px">${nodeName.toUpperCase()} Node</div>`;
  editor.addNode(nodeName, 1, 1, posX, posY, nodeName, {}, html);
}

// Livewire updated
document.addEventListener('livewire:updated', function () {
  console.log('Livewire updated — Drawflow tetap aman.');
});

// Save button listener
document.getElementById('saveFlowBtn').addEventListener('click', function () {
  const flowData = editor.export();
  console.log(typeof flowData);
  console.log('Saving flow data:', flowData);
  Livewire.dispatch('saveFlow', [flowData]);
});

window.addEventListener('flow-saved', event => {
  const alertBox = document.getElementById('flow-warning-alert');
  if (alertBox) alertBox.style.display = 'none';
});



function showFlowWarning(message) {
  const alertBox = document.getElementById('flow-warning-alert');
  const alertText = document.getElementById('flow-warning-text');
  if (alertBox && alertText) {
    alertText.innerHTML = `<strong>Warning!</strong> ${message}`;
    alertBox.style.display = 'block';
  }
}

document.addEventListener('DOMContentLoaded', function () {
  const alertBox = document.getElementById('flow-warning-alert');
  if (alertBox) alertBox.style.display = 'none';
  setTimeout(updateFlowChecklist, 500); // delay agar editor sudah siap
});


function updateFlowChecklist() {
  if (!editor) return;
  const nodesObj = editor.drawflow.drawflow.Home.data;
  const nodes = Object.values(nodesObj);

  // Cek node
  const hasStart = nodes.some(n => n.name === 'start');
  const hasEnd = nodes.some(n => n.name === 'end');
  const hasInputStart = nodes.some(n => n.name === 'input_start');
  const hasInputEnd = nodes.some(n => n.name === 'input_end');
  const hasInputName = nodes.some(n => n.name && n.name.startsWith('input_') && n.name !== 'input_start' && n.name !== 'input_end');

  // Cek koneksi: semua node punya minimal satu koneksi (input/output)
  const allConnected = nodes.every(n =>
    (n.inputs && Object.values(n.inputs).some(i => i.connections.length > 0)) ||
    (n.outputs && Object.values(n.outputs).some(o => o.connections.length > 0))
  );

  // Helper
  function setCheck(id, checked) {
    const el = document.getElementById(id);
    if (el) el.querySelector('span').textContent = checked ? '✅' : '❌';
  }

  setCheck('check-start', hasStart);
  setCheck('check-end', hasEnd);
  setCheck('check-input-start', hasInputStart);
  setCheck('check-input-end', hasInputEnd);
  setCheck('check-input-name', hasInputName);
  setCheck('check-connected', allConnected);
}

