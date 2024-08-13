$(document).ready(function () {
    function toggleInput(checkbox, input) {
        $(checkbox).on("change", function () {
            if ($(this).is(":checked")) {
                $(input).prop("disabled", false);
            } else {
                $(input).prop("disabled", true);
                $(input).val("");
            }
            updateTotalInput();
        });
    }

    $(
        "#weight_l_f, #weight_r_f, #weight_l_r, #weight_r_r, #weight_stepney, #weight_total"
    ).prop("disabled", true);

    toggleInput('input[value="L/F"]', "#weight_l_f");
    toggleInput('input[value="R/F"]', "#weight_r_f");
    toggleInput('input[value="L/R"]', "#weight_l_r");
    toggleInput('input[value="R/R"]', "#weight_r_r");
    toggleInput('input[value="stepney"]', "#weight_stepney");

    function updateTotalInput() {
        let anyChecked = $('input[name="balancing[]"]:checked').length > 0;
        $("#weight_total").prop("disabled", !anyChecked);
        if (!anyChecked) {
            $("#weight_total").val("");
        }
    }

    $('input[name="balancing[]"]').on("change", updateTotalInput);

    var today = new Date().toISOString().split("T")[0];
    $("#date").val(today);
    function toggleTableVisibility() {
        if ($("#alignment_yes").is(":checked")) {
            $("#alignment_table").show();
        } else {
            $("#alignment_table").hide();
        }
    }

    toggleTableVisibility();

    $("input[name='alignment']").on("change", function () {
        toggleTableVisibility();
    });

    function areRequiredFieldsFilled(part) {
        let requiredFields = part.find("[required]");
        let emptyFields = [];

        requiredFields.each(function () {
            let field = $(this);
            field.next(".error-message").remove();
            if (!field.val()) {
                let label = $('label[for="' + field.attr("id") + '"]').text();
                emptyFields.push(field);
                field.after(
                    '<span class="error-message" style="color: red;">Please fill this field</span>'
                );
            }
        });

        return emptyFields;
    }

    function handleNextClick(partNumber) {
        let currentPart = $("#part" + partNumber);
        let nextPart = $("#part" + (partNumber + 1));

        // let emptyFields = areRequiredFieldsFilled(currentPart);

        // if (emptyFields.length === 0) {
        currentPart.hide();
        nextPart.show();
        // }
    }

    function handleBackClick(partNumber) {
        let currentPart = $("#part" + partNumber);
        let previousPart = $("#part" + (partNumber - 1));

        currentPart.hide();
        previousPart.show();
    }

    for (let i = 1; i <= 10; i++) {
        $("#next" + i).on("click", function () {
            handleNextClick(i);
        });
        $("#back" + i).on("click", function () {
            handleBackClick(i);
        });
    }

    function areRequiredFieldsFilled(part) {
        let emptyFields = [];
        part.find("input[required], select[required], textarea[required]").each(
            function () {
                if ($(this).val() === "") {
                    emptyFields.push($(this));
                }
            }
        );
        return emptyFields;
    }

    $(document).on("input", "[required]", function () {
        $(this).next(".error-message").remove();
    });

    function calculateFitmentPrice() {
        var selectedCount = $('input[name="fitment[]"]:checked').length;
        $("#tyre_fitment_count").val(selectedCount);

        var wheelSize = parseInt($("#wheel_size").val());
        var wheelType = $('input[name="whl_a_or_o"]:checked').val();

        if (!wheelSize || !wheelType) {
            $("#tyre_fitment").val("");
            return;
        }

        var pricePerTyre = 0;
        if (wheelType === "A") {
            if (wheelSize >= 12 && wheelSize <= 14) {
                pricePerTyre = 100;
            } else if (wheelSize >= 15 && wheelSize <= 16) {
                pricePerTyre = 150;
            } else if (wheelSize >= 17 && wheelSize <= 18) {
                pricePerTyre = 200;
            } else if (wheelSize >= 19) {
                pricePerTyre = 250;
            }
        } else if (wheelType === "O") {
            if (wheelSize >= 12 && wheelSize <= 14) {
                pricePerTyre = 125;
            } else if (wheelSize >= 15 && wheelSize <= 16) {
                pricePerTyre = 175;
            } else if (wheelSize >= 17 && wheelSize <= 18) {
                pricePerTyre = 250;
            } else if (wheelSize >= 19) {
                pricePerTyre = 300;
            }
        }

        var totalPrice = pricePerTyre * selectedCount;
        $("#tyre_fitment").val(totalPrice.toFixed(2));
    }

    $('input[name="fitment[]"]').on("change", calculateFitmentPrice);
    $("#wheel_size").on("input", calculateFitmentPrice);
    $('input[name="whl_a_or_o"]').on("change", calculateFitmentPrice);

    function calculateBalancingPrice() {
        var selectedCount = $('input[name="balancing[]"]:checked').length;
        $("#wheel_blancing_count").val(selectedCount);

        var wheelSize = parseInt($("#wheel_size").val());
        var wheelType = $('input[name="whl_a_or_o"]:checked').val();

        if (!wheelSize || !wheelType) {
            $("#wheel_balancing").val("");
            return;
        }

        var pricePerWheel = 0;
        if (wheelType === "A") {
            // Alloy Wheels
            if (wheelSize >= 12 && wheelSize <= 13) {
                pricePerWheel = 125;
            } else if (wheelSize >= 14 && wheelSize <= 15) {
                pricePerWheel = 150;
            } else if (wheelSize >= 16 && wheelSize <= 17) {
                pricePerWheel = 175;
            } else if (wheelSize >= 18) {
                pricePerWheel = 250;
            }
        } else if (wheelType === "O") {
            // Ordinary Wheels
            if (wheelSize >= 12 && wheelSize <= 14) {
                pricePerWheel = 100;
            } else if (wheelSize >= 15 && wheelSize <= 17) {
                pricePerWheel = 150;
            } else if (wheelSize >= 18) {
                pricePerWheel = 250;
            }
        }

        var totalPrice = pricePerWheel * selectedCount;
        $("#wheel_balancing").val(totalPrice.toFixed(2));
    }

    $('input[name="balancing[]"]').on("change", calculateBalancingPrice);
    $("#wheel_size").on("input", calculateBalancingPrice);
    $('input[name="whl_a_or_o"]').on("change", calculateBalancingPrice);

    function calculateWeightTotal() {
        var weightLF = parseFloat($("#weight_l_f").val()) || 0;
        var weightRF = parseFloat($("#weight_r_f").val()) || 0;
        var weightLR = parseFloat($("#weight_l_r").val()) || 0;
        var weightRR = parseFloat($("#weight_r_r").val()) || 0;
        var weightStepney = parseFloat($("#weight_stepney").val()) || 0;

        var totalWeight =
            weightLF + weightRF + weightLR + weightRR + weightStepney;
        $("#weight_total").val(totalWeight.toFixed(2));

        // calculatePrice();
    }

    function calculatePrice() {
        var totalWeight = parseFloat($("#weight_total").val());
        var wheelType = $('input[name="whl_a_or_o"]:checked').val();

        if (!totalWeight || !wheelType) {
            $("#gram_weight_used").val("");
            return;
        }

        var price = 0;
        if (wheelType === "A") {
            price = totalWeight * 2;
        } else if (wheelType === "O") {
            price = totalWeight * 0.9;
        }

        $("#gram_weight_used").val(price.toFixed(2));
    }

    // Event listeners to trigger calculation
    $("#weight_l_f, #weight_r_f, #weight_l_r, #weight_r_r, #weight_stepney").on(
        "input",
        calculateWeightTotal
    );
    $('input[name="whl_a_or_o"]').on("change", calculatePrice);

    const $input = $("#make");
    const $dropdown = $("#make_list");
    const $items = $dropdown.children("div").toArray();

    $items.sort((a, b) => $(a).text().localeCompare($(b).text()));

    $dropdown.empty();
    $items.forEach((item) => $dropdown.append(item));

    const displayCount = 5;
    let startIndex = 0;

    function updateVisibleItems() {
        $items.forEach((item) => $(item).hide());
        for (
            let i = startIndex;
            i < startIndex + displayCount && i < $items.length;
            i++
        ) {
            $($items[i]).show();
        }
    }

    updateVisibleItems();

    $input.on("click", function () {
        $dropdown.show();
        startIndex = 0;
        updateVisibleItems();
    });

    $input.on("focus", function () {
        startIndex = 0;
        updateVisibleItems();
    });

    $input.on("input", function () {
        const filter = $input.val().toLowerCase();
        const filteredItems = $items.filter(
            (item) => $(item).text().toLowerCase().indexOf(filter) > -1
        );
        $dropdown.empty();
        filteredItems.forEach((item) => $dropdown.append(item));
        $items.length = 0;
        filteredItems.forEach((item) => $items.push(item));
        updateVisibleItems();
    });

    $(document).on("click", function (event) {
        if (!$(event.target).closest(".col-sm-4").length) {
            $dropdown.hide();
        }
    });

    $dropdown.on("click", "div", function () {
        $input.val($(this).data("value"));
        $dropdown.hide();
    });
    
    
    $("#wheel_size").on("input", function () {
        var value = $(this).val();
        var $error = $("#wheel_size_error");
        var isValidNumber =
            /^\d{1,2}$/.test(value) &&
            Number(value) >= 12 &&
            Number(value) <= 24;

        // if (!isValidNumber) {
        //     $(this).addClass("is-invalid");
        //     $error.text(
        //         "Please enter a valid two-digit number between 12 and 24."
        //     );
        // } else {
        //     $(this).removeClass("is-invalid");
        //     $error.text("");
        // }
    });

    // Function to generate serial number fields based on the number of tyres
function generateSerialNoFields(numberOfTyres) {
    var container = $("#serial_no_container");
    container.empty();

    for (var i = 1; i <= numberOfTyres; i++) {
        var serialNoGroup = `
            <div class="col-sm-12 mt-2">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="serial_no_alphanum_${i}" class="form-label">Serial No</label>
                        <input type="text" class="form-control" name="serial_no_alphanum" id="serial_no_alphanum_${i}">
                    </div>
                    <div class="col-sm-4">
                        <label for="serial_no_week_${i}" class="form-label">Week</label>
                        <input type="number" class="form-control serial_no_week" name="serial_no_week" id="serial_no_week_${i}" min="0" max="99">
                    </div>
                    <div class="col-sm-4">
                        <label for="serial_no_year_${i}" class="form-label">Year</label>
                        <input type="number" class="form-control serial_no_year" name="serial_no_year" id="serial_no_year_${i}">
                    </div>
                </div>
            </div>`;
        container.append(serialNoGroup);
    }

    // Apply input restrictions after generating the fields
    $(".serial_no_week, .serial_no_year").on("keypress", function (e) {
        let value = $(this).val();

        if (value.length >= 2) {
            e.preventDefault();
        }

        if (e.which < 48 || e.which > 57) {
            e.preventDefault();
        }
    });

    $(".serial_no_week, .serial_no_year").on("input", function () {
        let value = $(this).val();

        if (value.length > 2) {
            $(this).val(value.slice(0, 2));
        }
    });
}



// Regenerate fields whenever the number of tyres changes
$("#no_of_tyre_purchased").on("change", function () {
    var numberOfTyres = $(this).val();
    generateSerialNoFields(numberOfTyres);
});

    function togglePriceField(checkboxId, priceFieldId) {
        $("#" + checkboxId).change(function () {
            if ($(this).is(":checked")) {
                $("#" + priceFieldId).show();
            } else {
                $("#" + priceFieldId).hide();
            }
        });
    }

    $("#vehicle_reg").on("change", function () {
        var vehicleReg = $(this).val();
    
        $.ajax({
            url: "/admin/get-customer-details/" + vehicleReg,
            method: "GET",
            success: function (response) {
                if (response.error) {
                    // $("#part2").hide(); 
                } else {
                    $("#name").val(response.name).prop("readonly", true);
                    $("#telephone").val(response.telephone).prop("readonly", true);
                    $("#address").val(response.address).prop("readonly", true);
                    $("#make").val(response.make).prop("readonly", true);
                    $("#wheel_size").val(response.wheel_size);
    
                    $("#part2").show();  
                }
            },
            error: function () {
                // $("#part2").hide();  // Hide part 2 if there was an error with the request
            }
        });
    });
    
    function calculateTotal() {
        var weightLF = parseFloat($("#weight_l_f").val()) || 0;
        var weightRF = parseFloat($("#weight_r_f").val()) || 0;
        var weightLR = parseFloat($("#weight_l_r").val()) || 0;
        var weightRR = parseFloat($("#weight_r_r").val()) || 0;
        var weightStepney = parseFloat($("#weight_stepney").val()) || 0;

        var total = weightLF + weightRF + weightLR + weightRR + weightStepney;
        $("#weight_total").val(total.toFixed(2)); // Display the total with 2 decimal places
    }

    $("#weight_l_f, #weight_r_f, #weight_l_r, #weight_r_r, #weight_stepney").on(
        "input",
        calculateTotal
    );
    $("#tyre_rate").on("change", function () {
        if ($("#tyre_size").val() !== "" || $("#tyre_pattern").val() !== "") {
            var tyre_rate = $("#tyre_rate").val();
            var no_of_tyre_purchased = $("#no_of_tyre_purchased").val();

            $("#tyre_purchase").val(
                parseFloat(no_of_tyre_purchased) * parseFloat(tyre_rate)
            );
        }
    });
    $(document).ready(function () {
        function toggleOtherOptions() {
            if ($("#other_yes").is(":checked")) {
                $("#other_options").show();
            } else {
                $("#other_options").hide();
                resetOtherPrices();
            }
        }

        function resetOtherPrices() {
            $("#price_tubeless").val(0);
            $("#price_nitrogen").val(0);
            $("#price_tyre_rotation").val(0);
            $("#price_other_text").val(0);
            calculateTotalPrice();
        }

        function togglePriceField(checkboxId, priceFieldId) {
            $("#" + checkboxId).change(function () {
                if ($(this).is(":checked")) {
                    $("#" + priceFieldId).show();
                } else {
                    $("#" + priceFieldId).hide();
                    $("#" + priceFieldId + " input").val(0);
                    calculateTotalPrice();
                }
            });
        }

        function calculateTotalPrice() {
            var tubelessPrice = parseFloat($("#price_tubeless").val()) || 0;
            var nitrogenPrice = parseFloat($("#price_nitrogen").val()) || 0;
            var rotationPrice =
                parseFloat($("#price_tyre_rotation").val()) || 0;
            var otherPrice = parseFloat($("#price_other_text").val()) || 0;

            var totalPrice =
                tubelessPrice + nitrogenPrice + rotationPrice + otherPrice;
            $("#others").val(totalPrice.toFixed(2));
        }

        $('input[name="other_option"]').change(function () {
            toggleOtherOptions();
        });

        togglePriceField("other_type_tubeless", "price_tubeless_field");
        togglePriceField("other_type_nitrogen", "price_nitrogen_field");
        togglePriceField(
            "other_type_tyre_rotation",
            "price_tyre_rotation_field"
        );
        togglePriceField("other_type_other", "other_fields");

        $(
            "#price_tubeless, #price_nitrogen, #price_tyre_rotation, #price_other_text"
        ).on("input", calculateTotalPrice);

        toggleOtherOptions(); // Initial call to handle the default state
    });
    function calculateTotal() {
        var tyreFitment = parseFloat($("#tyre_fitment").val()) || 0;
        var wheelBalancing = parseFloat($("#wheel_balancing").val()) || 0;
        var wheelAlignment = parseFloat($("#wheel_alignment").val()) || 0;
        var gramWeightUsed = parseFloat($("#gram_weight_used").val()) || 0;
        var tyrePurchase = parseFloat($("#tyre_purchase").val()) || 0;
        var others = parseFloat($("#others").val()) || 0;

        var total =
            tyreFitment +
            wheelBalancing +
            wheelAlignment +
            gramWeightUsed +
            tyrePurchase +
            others;
        $("#total").val(total.toFixed(2));
    }

    function calculateNetAmountAndGST() {
        var total = parseFloat($("#total").val()) || 0;
        var discountAmount = parseFloat($("#discount_amount").val()) || 0;

        var netAmount = total - discountAmount;
        $("#net_amount").val(netAmount.toFixed(2));

        var sgst = (netAmount * 9) / 118;
        var cgst = (netAmount * 9) / 118;

        $("#sgst").val(sgst.toFixed(2));
        $("#cgst").val(cgst.toFixed(2));
    }

    function calculateAndDisplayValues() {
        calculateTotal();
        calculateNetAmountAndGST();
    }

    $(
        "#tyre_fitment, #wheel_balancing, #wheel_alignment, #gram_weight_used, #tyre_purchase, #others"
    ).on("input", calculateTotal);
    $("#discount_amount").on("input", calculateNetAmountAndGST);

    $("#update").click(function () {
        calculateAndDisplayValues();
    });
    function resetFormAndGoToPart1() {
        $("form")[0].reset();
        $("#part1").show();
        $(
            "#part2, #part3, #part4, #part5, #part6, #part7, #part8, #part9,#part10"
        ).hide();
    }

    $("button[type='reset']").click(function () {
        resetFormAndGoToPart1();
    });

    var $alignmentYes = $('#alignment_yes');
    var $alignmentNo = $('#alignment_no');
    var $makeSelect = $('#make');
    var $totalInput = $('#wheel_alignment');

    function updateTotal() {
        var selectedOption = $makeSelect.find(':selected');
        var rate = selectedOption.length ? selectedOption.data('rate') : 0;

        if ($alignmentYes.is(':checked')) {
            $totalInput.val(rate);
        } else if ($alignmentNo.is(':checked')) {
            $totalInput.val(0);
        } else {
            $totalInput.val('');
        }
    }

    $alignmentYes.on('change', updateTotal);
    $alignmentNo.on('change', updateTotal);
    $makeSelect.on('change', updateTotal);
});
