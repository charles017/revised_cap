$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();

    $('#clients table.table td .add').toggle(false);
  
	var actions = $("#clients table td:last-child").html();

    $(".add-new").click(function(){
		$(this).attr("disabled", "disabled");
		var index = $("#clients table tbody tr:last-child").index();
        var row = '<tr id="server_0">' +
            '<td><input type="text" class="form-control" name="csr_label" id="csr_label"></td>' +
            '<td><input type="text" class="form-control" name="csr_1" id="csr_1"></td>' +
            '<td><input type="text" class="form-control" name="csr_2" id="csr_2"></td>' +
            '<td><input type="text" class="form-control" name="csr_3" id="csr_3"></td>' +
			'<td class="crud">' + actions + '</td>' +
        '</tr>';
    	$("#clients table").append(row);		
		$("#clients table tbody tr").eq(index + 1).find(".add, .edit").toggle();
        $('[data-toggle="tooltip"]').tooltip();
    });
	// Add row on add button click
	$(document).on("click", ".add", function(){
		var empty = false;
		//var input = $(this).closest("tr").find('input[type="text"]');
        var input = $(this).closest("tr").find('input[type="text"]');
        input.each(function(){
			if(!$(this).val()){
				$(this).addClass("error");
				empty = true;
			} else{
                $(this).removeClass("error");
            }
		});
		$(this).closest("tr").find(".error").first().focus();
		if(!empty){
            input.each(function () {
                if ($(this).is(".pw")) {
                   
                    var asterisks = $(this).val().split('').map(function () {
                        return "*";
                    });
                    $(this).parent("td").text(asterisks.join("")).append('<input type="hidden" value="' + $(this).val() + '"/>');    
                } else {
                    $(this).parent("td").html($(this).val());
                }
				
			});			
			$(this).closest("tr").find(".add, .edit").toggle();
			$(".add-new").removeAttr("disabled");
		}		
    });
	// Edit row on edit button click
	$(document).on("click", ".edit", function(){		
        $(this).closest("tr").find("td:not(:last-child)").each(function () {
            if ($(this).is(".pw")) {
                $(this).html('<input type="password" class="form-control pw" value="' + $(this).find('input[type="hidden"]').val() + '">');
            } else {
                $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
            }
			
		});		
		$(this).closest("tr").find(".add, .edit").toggle();
		$(".add-new").attr("disabled", "disabled");
    });
	// Delete row on delete button click
    $(document).on("click", ".delete", function () {      
        if (!$(".add-new").prop("disabled")) {
            var delable = $("#csrs_table").data("delete");
            delable += $(this).closest("tr").attr("id").replace("csr_", "") + "¬";
            $("#csrs_table").data("delete", delable);
        }
            $(this).closest("tr").remove();
            $(".add-new").removeAttr("disabled");
    });
});
l


    function SaveCsrList() {
        alert("Data saved!");
    }
