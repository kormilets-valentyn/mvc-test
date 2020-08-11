function validateFullName(name){
    let isValid = /^([А-ЯA-Z]|[А-ЯA-Z][\x27а-яa-z]{1,}|[А-ЯA-Z][\x27а-яa-z]{1,}\-([А-ЯA-Z][\x27а-яa-z]{1,}|(оглы)|(кызы)))\040[А-ЯA-Z][\x27а-яa-z]{1,}(\040[А-ЯA-Z][\x27а-яa-z]{1,})?$/
    let result = isValid.test(name)
    if (result){
        return true
    } else {
        alert('Wrong name!!!')
    }
}

function validateEmail(email){
    let isValid = (email.match(/.+?\@.+/g) || []).length === 1;
    if (isValid){
        return true
    } else {
        alert('Wrong email!!!')
    }
}

function validateCity(checkAttribute){
    if(checkAttribute == ""){
        alert("Select something")
    } else {
        return true;
    }
}

$(document).ready(function(){

    $("#send").click(function (){
        var form = $("#form");
        var full_name = form[0][0].value;
        var email = form[0][1].value;
        var city = $("#main_select2").children("option:selected").text();
        if (city == ""){
            alert("Please select value");
            return
        }
        var vilage = $("#main_select3").children("option:selected").text();
        var checkCityAttribute = $("#main_select2").children("option:selected").val();
        if (validateFullName(full_name) && validateEmail(email) && validateCity(checkCityAttribute)){
            $.ajax({
                type: "POST",
                url: "/ajax/save",
                data: {
                    name: full_name,
                    email: email,
                    city: city,
                    village: vilage
                },
                success: function(res){
                    if (res == 1){
                        location.href = '/info';
                    } else {
                        document.getElementById("full_name").value = "";
                        document.getElementById("email").value = "";
                        $('#main_select').val('').trigger('chosen:updated');
                        $("#container2").empty();
                        $("#container3").empty();
                        $("#container4").text('Saved');
                        setTimeout(function () {
                            $("#container4").empty();
                        }, 1000)
                    }
                }
            })
        }

    })

    $("#main_select").change(function(){
        var selectValue = $("#main_select");
        $.ajax({
            type: "POST",
            url: "/ajax/ajax",
            data: {
            id: selectValue.children("option:selected").val()
            },
            success: function(res){
                var result = JSON.parse(res);
                var select = $("<select class=\"chosen-select\"></select>").attr("id", "main_select2");
                select.append($("<option></option>").attr("value", "").text('Select an option...'));
                $.each(result,function(index,result){
                select.append($("<option></option>").attr("value", result.ter_id).text(result.ter_address));
                });
                $("#container2").html(select);
                $(".chosen-select").chosen();
            }
        })
    })

    $("#container2").change(function(){
        var selectValue2 = $("#main_select2");
        $.ajax({
            type: "POST",
            url: "/ajax/ajax",
            data: {
            id: selectValue2.children("option:selected").val()
            },
            success: function(res){
                var result2 = JSON.parse(res);
                if (Object.keys(result2).length !== 0){
                    var select2 = $("<select class=\"chosen-select\"></select>").attr("id", "main_select3");
                    $.each(result2,function(index,result2){
                    select2.append($("<option></option>").attr("value", result2.ter_id).text(result2.ter_address));
                    });
                    $("#container3").html(select2);
                    $(".chosen-select").chosen();
                } else $("#container3").empty();
            }
        })
    })
})
