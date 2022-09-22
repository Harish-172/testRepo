<<<<<<< HEAD
class Admin{
    constructor(){
        $(document).on('click', '.delete-category', this.sendCategoryData)
        $(document).on('click', '.delete-product', this.sendProductData)
    }

    /* send the category data to delete the category */
    sendCategoryData(){ 
        if(confirm("Are you sure to delte the category!!")){
            let categoryId = $(this).data('id');
            obj.post({
                url:'delete/category',
                data:{"categoryId":categoryId},  
            }).subscribe()
            .then( (res) =>{
                    location.reload();     
            })
            .catch( err =>{
    
                alert(err);
            });
        }
    }


    /* send the product data to delete the product */
    sendProductData(){ 
        if(confirm("Are you sure to delete the product!!")){
            let productId = $(this).data('id');
            obj.post({
                url:'delete',
                data:{"productId":productId},  
            }).subscribe()
            .then( (res) =>{
                    location.reload();     
            })
            .catch( err =>{
    
                alert(err);
            });
        }

    }
=======
"use strict";
class Admin{
    constructor(){
        this.addEvent()
        .then(res =>{
            console.log(res)
            // location.reload;
           })
        .catch( err =>alert(err));
    }

    addEvent(){
        $(document).on("click", ".delete-category", this.DeleteCategory);
    }

    DeleteCategory(){
        let categoryId = $(this).data('id'); 
        if(confirm("Are you want to delete the categpory")){
                return new Promise(function (resolve, reject){                     
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });            
                    $.ajax({
                        type: 'post',
                        url: 'delete/category',
                        data: {"categoryId": categoryId},    
                        success:function(res){
                            resolve(res);
                        },
                        error:function(err){
                            reject(err);
                        }
                    })
                });        
        }
    };



>>>>>>> 909ea79... move data with standard using promise in js
}
new Admin;