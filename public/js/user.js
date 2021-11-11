let table;
$(document).ready(function() {
    table= $('#table_id').DataTable({
        processing: true,
        serverSide: true,
        fixedColumns:   true,
        select:         true,
        ajax: "/api/getData",
        columns: [
            { "data": "id" },
            { "data": "name" },
            { "data": "email" },
            { "data": "type_user" },
            { "data": "number" },
            { "data": "cedula" },
            { "data": "code_city" },
            { "data": "birth_date" },
        ],
    });
});
function getData() {
    $('#table_id').DataTable().destroy();
    table= $('#table_id').DataTable({
        processing: true,
        serverSide: true,
        fixedColumns:   true,
        select:         true,
        ajax: "/api/getData",
        columns: [
            { "data": "id" },
            { "data": "name" },
            { "data": "email" },
            { "data": "type_user" },
            { "data": "number" },
            { "data": "cedula" },
            { "data": "code_city" },
            { "data": "birth_date" },
        ],
    });

}
function delete_user(){
    let ids=table.rows('.selected').data()
    console.log(ids[0])
    if(ids.length == 0){
        alert('Please select user');
    }else{
        $.ajax({
            url:"/api/delete",
            data:{_token:'{{ csrf_token() }}', data:ids[0].id},
            type: 'POST',
            success: (response)=>{
                console.log(response)
                getData()
            }
    
        })
       
    }
   
}
function edith(){
    let ids=table.rows('.selected').data()
    if(ids.length == 0){
        alert('Please select user');
    }else if(ids.length >1){  
        alert('Please select one user');
       
    }else{
        console.log(ids[0])
        $("#id_user").val(ids[0].id)
        $("#name_edit").val(ids[0].name)
        $("#type_edith").val(ids[0].type_user)
        $("#phone_edith").val(ids[0].number)
        $("#Code_edith").val(ids[0].code_city)
       
        $("#exampleModal").modal('show'); // 
    }
  
}
function save(){
   let id=  $("#id_user").val()
   let name= $("#name_edit").val()
   let type= $("#type_edith").val()
   let number= $("#phone_edith").val()
   let code= $("#Code_edith").val()
  
   let params = {_token:'{{ csrf_token() }}', id: id, name: name, type: type, number: number}
   $.ajax({
       url: "/api/update",
       data:params,
       type: 'POST',
       success: (response)=>{
        $("#exampleModal").modal('hide'); //
            getData()
       }
   })
}