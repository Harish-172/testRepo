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
}
new Admin;