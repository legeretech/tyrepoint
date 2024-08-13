document.addEventListener('DOMContentLoaded', function() {
    const tyreBrands = [
        "APOLLO", "BRIDGESTONE", "CEAT", "CENTARA", "COMFORSER", "CONTINENTAL",
        "DUNLOP", "DURATURN", "FALKEN", "FIRESTONE", "GOODYEAR", "GREENLANDER",
        "HANKOOK", "INFINITY", "JK", "JOURNEY", "JOYROAD", "KELLY", "KENDA",
        "LEAO", "MAXXIS", "MICHELIN", "MRF", "PIRELLI", "ROAD CRUZA", "SAILWIN",
        "TORQUE", "TRIANGLE", "WANDA", "YOKOHAMA"
    ];

    const tyrePatterns = {
        APOLLO: ["3G", "4G LIFE", "ALNAC 4G", "ALTRUST", "AMAZER XL", "BHIM"],
        BRIDGESTONE: [
            "A/T002", "ALENZA", "B250", "B290", "B800", "d689", "D693", "DHP",
            "EP150", "EP850", "ER300", "ER60", "G3", "L607", "MY02", "PREMIUM CAB",
            "R623", "RE050", "RE88", "S001", "S248", "S322", "STURDO", "T001",
            "T005", "TK001", "TURANZA 6i"
        ],
        CEAT: [
            "CROSSDRIVE", "CZAR", "FORMULA STEEL", "FUELSMART", "LYFMAX", "MILAZE LT",
            "MILAZE X3", "MILAZE X5", "SECURADRIVE", "SPORTDRIVE", "STEEL PLUS", "WINMILE X3"
        ],
        GOODYEAR: [
            "ASSURANCE DURAPLUS", "ASSURANCE DURAPLUS 2", "ASSURANCE MAXGUARD",
            "ASSURANCE TRIPLEMAX", "ASSURANCE TRIPLEMAX 2", "DP-M1", "DP-V1",
            "DUCARO HIMILER", "DURAPLUS", "EAGLE NCT5", "EFG", "WRANGLER AT/SA",
            "WRANGLER RT/S", "WRANGLER TRIPLEMAX"
        ],
        JK: [
            "BRUTE LT", "BRUTE NE", "ELANZO SUPRA", "ELANZO TOURING", "JUMBO",
            "JUMBO KING", "JUMBO MAGIC", "RANGER BRUTE", "RANGER H/T", "STEEL KING LT",
            "TAXIMAX", "TORNADO", "ULTIMA HI LIFE", "ULTIMA LXT", "ULTIMA NEO",
            "ULTIMA NXT", "ULTIMA SPORT", "ULTIMA XPC LT", "UX ROYALE", "VECTRA", "ZEPHYR"
        ],
        KELLY: ["VFM 1", "VFM 2", "VFM 3", "VFM 5", "VFM 6", "VFM 8"],
        YOKOHAMA: ["AE51", "E400", "G015 A/T", "G015 L/T", "GEOLANDER A/T", "GEOLANDER LT"]
    };

    const brandSelect = document.getElementById('tyre_brand');
    const patternSelect = document.getElementById('tyre_pattern');

    function populateSelect(selectElement, options) {
        selectElement.innerHTML = '';
        options.forEach(optionValue => {
            const option = document.createElement('option');
            option.value = optionValue;
            option.textContent = optionValue;
            selectElement.appendChild(option);
        });
    }

    populateSelect(brandSelect, tyreBrands);

    function updatePatterns() {
        const selectedBrand = brandSelect.value.toUpperCase();
        const patterns = tyrePatterns[selectedBrand] || [];
        populateSelect(patternSelect, patterns);
    }

    brandSelect.addEventListener('change', updatePatterns);
});
