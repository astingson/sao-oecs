$(document).ready(function(){

    // jQuery.each(obj, function(k, val) {
    //     $('input[name="moreFields[' + k + '][item_quantity]"]')
    // });

    var openmodal = document.querySelectorAll('.modal-open');
    for (var i = 0; i < openmodal.length; i++) {
        openmodal[i].addEventListener('click', function(event){
        event.preventDefault();
        toggleModal();
        });
    }
    
    const overlay = document.querySelector('.modal-overlay');
    if(overlay) {
        overlay.addEventListener('click', toggleModal);
    }
    
    var closemodal = document.querySelectorAll('.modal-close')
    for (var q = 0; q < closemodal.length; q++) {
        closemodal[q].addEventListener('click', toggleModal)
    }
    
    document.onkeydown = function(evt) {
        evt = evt || window.event;
        var isEscape = false;
        if ("key" in evt) {
            isEscape = (evt.key === "Escape" || evt.key === "Esc");
        } else {
            isEscape = (evt.keyCode === 27);
        }
        if (isEscape && document.body.classList.contains('modal-active')) {
            toggleModal();
        }
    };

    $('#coorganization').change(function () {
        var coorg_input = document.getElementById("coorganization").value;
        if(coorg_input == "External" || coorg_input == "Internal") {
            $("#coorganization_info").show();
        }
        else if (coorg_input == "None") {
            $("#coorganization_info").hide();
            $("#coorganizer_name").val("");
            $("#coorganizer_contact").val("");
            $("#coorganizer_email").val("");
        }
        console.log(coorg_input);
    });

    $('div.success').delay(1500).slideUp(600);

    $("#has_rf").on("change", function() {
        if($(this).is(':checked')) {
            switchStatus = $(this).is(':checked');
            //console.log(switchStatus);
            $("#budgetForm").toggle();
        }
        else {
            switchStatus = $(this).is(':checked');
            console.log(switchStatus);
            $("#budgetForm").toggle();
            $("#date_needed").val("");
            $("#requi_type").val("");
            $("#remarks").val("");
            $("#charged").val("");
            $("#total_cost").val("");
            for(var i = 0; i < counter; i++) {
                $('input[name="moreFields[' + i + '][item_quantity]"]').val("");
                $('input[name="moreFields[' + i + '][item_purpose]"]').val("");
                $('input[name="moreFields[' + i + '][item_cost]"]').val("");
                //console.log(i, counter);
            }
        }
    });


    $("#rfTable").on("keyup", function() {
        ajaxCalculateTotalCost();
    });

    $("#addRow").click(function() {
        var newRow = "<tr>" +

            "<td class='px-2 justify-center whitespace-no-wrap border-b border-gray-200'>" +
                "<div class=''>" +
                    "<label class='flex items-center'>" +
                        "<input type='checkbox' name='record' class='form-checkbox h-5 w-5 text-red-600'>" +
                    "</label>" +
                "</div>" +
            "</td>" +

            "<td class='px-2 py-4 whitespace-no-wrap border-b border-gray-200'>" +
                "<div class='flex items-center'>" +
                    "<input name='moreFields[" + counter + "][item_quantity]' class='item_quantity appearance-none block w-full bg-gray-100 text-grey-darker border border-grey-lighter " +
                    "rounded py-3 px-4' type='number' placeholder='' required>" +
                "</div>" +
            "</td>" +

            "<td class='px-2 py-4 whitespace-no-wrap border-b border-gray-200'>" +
                "<div class='flex items-center'>" +
                    "<input name='moreFields[" + counter + "][item_purpose]'' class='item_purpose appearance-none block w-full bg-gray-100 text-grey-darker border border-grey-lighter " +
                    "rounded py-3 px-4' type='text' placeholder='' required>" +
                "</div>" +
            "</td>" +

            "<td class='px-2 py-4 whitespace-no-wrap border-b border-gray-200'>" +
                "<div class='flex items-center'>" +
                    "<input name='moreFields[" + counter + "][item_cost]' class='item_cost appearance-none block w-full bg-gray-100 text-grey-darker border border-grey-lighter " +
                    "rounded py-3 px-4' type='number' placeholder='' required>" +
                "</div>" +
            "</td>" +
        "</tr>";

        $(".rf_tbody").append(newRow);

        counter++;
    });

    $("#removeRow").click( function() {
        $(".rf_tbody").find('input[name="record"]').each(function(){
            if($(this).is(":checked")) {
                counter--;
                $(this).parents("tr").remove();
            }
        });
        ajaxCalculateTotalCost();
    });
});

var switchState = false;

var counter = parseInt(document.getElementById('lastIndex').value);

console.log(counter);

function toggleModal () {
    const body = document.querySelector('body');
    const modal = document.querySelector('.modal');
    modal.classList.toggle('opacity-0');
    modal.classList.toggle('pointer-events-none');
    body.classList.toggle('modal-active');
}

function ajaxCalculateTotalCost() {
    var qtyArray = [];
    var costArray = [];
    var totalCost = 0;
    $(".item_quantity").each(function () {
        if(!isNaN(this.value) && this.value.length != 0) {
            qtyArray.push(this.value);
        }
    });

    $(".item_cost").each(function () {
        if(!isNaN(this.value) && this.value.length != 0) {
            costArray.push(this.value);
        }
    });

    for(i = 0; i < qtyArray.length && i < costArray.length; i++) {
        totalCost += qtyArray[i] * costArray[i];
    }

    document.getElementById("total_cost").value = totalCost;
}