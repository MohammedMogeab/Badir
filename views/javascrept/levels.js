document.addEventListener('DOMContentLoaded', function() {
    const phaseInput = document.getElementById('phaseInput');
    const addPhaseBtn = document.getElementById('addPhaseBtn');
    const phasesList = document.getElementById('phasesList');
    const phasesData = document.getElementById('phasesData');
    const levelInput = document.getElementById('levelselect');

    let phases = [];
    
    // إضافة مرحلة جديدة
    function addPhase() {
        const phaseText = phaseInput.value.trim();
        
        if (phaseText) {
            phases.push(phaseText);
            renderPhases();
            updateHiddenInput();
            phaseInput.value = '';
            phaseInput.focus();
        }
    }
    
    // عرض المراحل في الواجهة
    function renderPhases() {
        if (phases.length === 0) {
            phasesList.innerHTML = '<div class="no-phases">لا توجد مراحل مضافة بعد</div>';
            phasesData.value = "[\"جمع التبرعات\"]";
            levelInput.add(new Option('جمع التبرعات',"0"));
            return;
        }
        
        phasesList.innerHTML = '';
        const selected_index = levelInput.selectedIndex;
        levelInput.innerHTML = '';

        phases.forEach((phase, index) => {
            const phaseItem = document.createElement('div');
            const optionItem = document.createElement('option');
            phaseItem.className = 'phase-item';
            phaseItem.innerHTML = `
                <div class="phase-content">
                    <div class="phase-number">${index + 1}</div>
                    <div class="phase-text">${phase}</div>
                </div>
                <div class="remove-phase" data-index="${index}">×</div=>
            `;
            optionItem.text = phase;
            optionItem.value = (index + 1);
            phasesList.appendChild(phaseItem);
            levelInput.appendChild(optionItem);
        });
        levelInput.selectedIndex = selected_index;

        document.querySelectorAll('.remove-phase').forEach(btn => {
            btn.addEventListener('click', function() {
                const index = parseInt(this.getAttribute('data-index'));
                phases.splice(index, 1);
                levelInput.remove(index);
                renderPhases();
                updateHiddenInput();
            });
        });
    }
    
    // تحديث الحقل المخفي
    function updateHiddenInput() {
        phasesData.value = JSON.stringify(phases);
    }
    
    // إضافة مرحلة عند الضغط على زر الإضافة
    addPhaseBtn.addEventListener('click', addPhase);
    
    // إضافة مرحلة عند الضغط على Enter
    phaseInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            addPhase();
        }
    });
    
    // تهيئة أولية
    renderPhases();
});