'use_strict';
//promo code delete start
function promocodedelete(x){
        swal({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            buttons: {
            confirm: {
                text: "Yes, delete it!",
                className: "btn btn-success",
            },
            cancel: {
                visible: true,
                className: "btn btn-danger",
            },
            },
        }).then((Delete) => {
            if (Delete) {
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch(`/deletepromocode/${x}`, {
                    method: 'delete',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    body: JSON.stringify({ id: x })
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success){
                        swal({
                            title: "Deleted!",
                            text: data.message,
                            type: "success",
                            buttons: {
                            confirm: {
                                className: "btn btn-success",
                            },
                            },
                        }).then(()=>{
                            window.location.reload();
                        });
                    }else{
                        swal({
                            title:"Error!",
                            text:data.message,
                            icon:"error",
                            buttons:{
                                confirm:{
                                    className: "btn btn-danger",
                                }
                            }
                        })
                    }

                })
                .catch(error => {
                    swal.close();

                });


            }
        });



}
// promo code delete end


