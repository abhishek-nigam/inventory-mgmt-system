var resultsPerPageForm = document.getElementById("results-per-page-form");
var resultsPerPageSelectField = document.getElementById("results-per-page");

resultsPerPageSelectField.addEventListener("change", function(){
    resultsPerPageForm.submit();
});



var modal = document.getElementById("modal");
var modalTitle = document.getElementById("modal-title");
var modalInfo = document.getElementById("modal-info");
var confirmBtn = document.getElementById("modal-confirm-btn");
var cancelBtn = document.getElementById("modal-cancel-btn");
var cancelBgBtn = document.getElementById("modal-bg-cancel-btn");

var options = document.getElementsByClassName('options');

for (option of options)
{
    option.addEventListener("click",function(e){

        var option_type = this.getAttribute("data-option-type");
        var data_id = this.getAttribute("data-row-id");
        var table_name = this.getAttribute("data-table-name");


        if(option_type == 'delete')
        {
            modalTitle.innerHTML = "Delete record #" + data_id + " ?";
            modalInfo.innerHTML = "Confirm delete record with ID " + data_id + " ? <br><br><strong>Warning! This will permanently delete this record and cannot be recovered.</strong>";
        }
        else if(option_type == 'edit')
        {
            modalTitle.innerHTML = "Edit record #" + data_id + " ?";
            modalInfo.innerHTML = "Confirm editing record with ID " + data_id + " ?";
        }

        modal.classList.add("is-active");

        confirmBtn.addEventListener("click", function(){
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
        });

        cancelBtn.addEventListener("click", function(){
            modal.classList.remove("is-active");
        });

        cancelBgBtn.addEventListener("click", function(){
            modal.classList.remove("is-active");
        });
    });
}