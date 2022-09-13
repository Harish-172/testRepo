jQuery(function( $ ) {
    var delete_category_actions = {
        /**
		 * Initialize variations actions
		 */
		init: function() {
			$( '.delete-category' )
				.on( 'click', this.delete_category );
		},

        /**
         * get the category id
         */
        delete_category: function(){
            if(confirm("Are you want to delete the categpory")){
                let categoryId = $(this).data('id');    
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
                        console.log(res.sucess);
                    },
                    error:function(err){
                        alert(err);
                    }
                })
            }
            
        },


    }

    delete_category_actions.init();
});


