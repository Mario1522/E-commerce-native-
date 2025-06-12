<script>
    $('._form').submit(function(e){
        e.preventDefault()

        var name = $('._name').val();
        var email = $('._email').val();
        var phone = $('._phone').val();
        var message = $('._message').val();

        if(! name){
            $('._name').attr("placeholder","Please Enter Your Name");
        }

        if(! email){
            $('._email').attr("placeholder","Please Enter Your Email");
        }

        if(! phone){
            $('._phone').attr("placeholder","Please Enter Your Phone");
        }

        if(! message){
            $('._message').attr("placeholder","Please Enter Your Message");
        }

        if(name && email && phone && message ){
            $.post("dashnoard/functions/messages/add-ms.php",{
                name:name,
                email:email,
                phone:phone,
                message:message,
            },function(data){
                $("._call").html(data);

                setTimeout(() => {
                    $("._name").val("");
                    $("._email").val("");
                    $("._phone").val("");
                    $("._message").val("");
                    $("._call").css("display","none");
                }, 1000);
            })
        }
    })





    $('._cart').click(function(){
        let proId = $(this).attr("pro-id")

        $.post("functions/cart/ajax.php",{
            proId : proId
        },function(data){
            $('._total').html(data)

            $(".cart-items").load(location.href+" .cart-items",function(){

            $('._del').click(function(e){
            e.preventDefault();
            var id = $(this).attr("pro-id");
            $(this).closest(".li").remove();
            $.post("functions/cart/delete.php",{
                id:id
            },function(data){
                $('.totC').text(data)
                
            })

        })
            })
        })
    })



    $('._del').click(function(e){
            e.preventDefault();
            var id = $(this).attr("pro-id");
            $(this).closest(".li").remove();
            $.post("functions/cart/delete.php",{
                id:id
            },function(data){
                $('.totC').text(data)
                
            })

        })


    $('.search').keyup(function(){
        let value = $('.search').val()
        if(value){
            $.post("./functions/search.php",{
                value : value
            },function (data) {
                $('.result').html(data)
                
            })
        }else{
            $('.result').html("")
        }
    })


    
    $('._wishlist').click(function(){
        let proId = $(this).attr("pro-id")

        $.post("functions/wishlist/ajax.php",{
            proId : proId
        },function(data){
            $('.wl').css("display","block")
            $('.wl').html(data)
            setTimeout(() => {
                $('.wl').css("display","none")
            }, 1000);
            $(".wishlist").load(location.href+" .wishlist",function(){

            $('.del-wish').click(function(e){
            e.preventDefault();
            var id = $(this).attr("pro-id");
            $(this).closest(".li").remove();
            $.post("functions/wishlist/delete.php",{
                id:id
            },function(data){
                $('.totW').text(data)
            })

        })
            })
        })
    })


    $('.del-wish').click(function(e){
            e.preventDefault();
            var id = $(this).attr("pro-id");
            $(this).closest(".li").remove();
            $.post("functions/wishlist/delete.php",{
                id:id
            },function(data){
                $('.totW').text(data)
            })

        })



</script>