var resultsPerPageForm = document.getElementById("results-per-page-form");
var resultsPerPageSelectField = document.getElementById("results-per-page");

resultsPerPageSelectField.addEventListener("change", function(){
    resultsPerPageForm.submit();
});


var option_type;
var data_id;
var table_name;

var options = document.getElementsByClassName('options');

for (option of options)
    {
        option.addEventListener("click",function(e){
            option_type = this.getAttribute("data-option-type");
            data_id = this.getAttribute("data-row-id");
            table_name = this.getAttribute("data-table-name");

            if(option_type == 'delete')
            {
                var proceed_confirm = confirm("Do you really want to delete record with ID " + data_id + " ? \nWARNING: This will permanently delete this record!");
            }
            else if(option_type == 'edit')
            {
                var proceed_confirm = confirm("Do you want to edit the record with ID " + data_id + " ?");
            }

            if(proceed_confirm)
            {
                if(option_type == 'edit')
                {
                    var path = "./table." + table_name + ".edit.php?" + "record_id=" + data_id;
                    window.location = path;
                }
                else if(option_type == 'delete')
                {
                    var path = "./table.delete.php?" + "table_name=" + table_name + "&record_id=" + data_id;
                    window.location = path;
                }
            }
        });
    }
