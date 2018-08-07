<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Test</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .form_div{
                margin-bottom: 10px;
            }

            .form_label{
                margin-right: 10px;
                font-weight: bold;
            }
        </style>
    </head>
    <body>

        <div class="flex-center position-ref full-height">
            

            <div class="content">

                <form id="submit_form">
                    <div class="form_div">
                        <label class="form_label">Product name</label>
                        <input type="text" name="product_name" required>
                    </div>
                    <div class="form_div">
                        <label class="form_label">Quantity in stock</label>
                        <input type="text" name="quantity" required>
                    </div>
                    <div class="form_div">
                        <label class="form_label">Price per item</label>
                        <input type="text" name="price" required>
                    </div>

                    <Button type="button" id="submit_btn">Submit</Button>
                </form>
                <table border="1" style="font-weight: bold;margin-top: 30px;">
                    <thead>
                    <tr id="theader">
                        <td>Id</td>
                        <td>Product name</td>
                        <td>Quantity</td>
                        <td>Price</td>
                        <td>Total</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody id="table">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </body>



    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

     <script type="text/javascript">
        $(document).ready(function(){
            call_atrun();
            $('#submit_btn').click(function(){

                var product_name = $('input[name="product_name"]').val();
                var quantity = $('input[name="quantity"]').val();
                var price = $('input[name="price"]').val();

                $.get('{{ url("/submit_form") }}',{ product_name:product_name, quantity:quantity, price:price }).done(function(data){

                    if(data == "success")
                    {
                        alert("Submited successfully.");
                        call_atrun();
                    }
                    else
                    {
                        alert("Fail");
                    }

                }); 

            });



            function call_atrun()
            {   
                $('#table').html('');
                for(var i=0;i<="{{ $file_count }}";i++)
                {

                    $.getJSON('{{ asset("/submit_data/") }}/'+i+'.json',function(data){
                        // var j = 1;
                        $.each(data,function(key,val){

                            var html = "<tr><td>"+val.id+"</td><td>"+val.product_name+"</td><td>"+val.quantity+"</td> <td>"+val.price+"</td><td>"+val.total+"</td><td>Action</td></tr>";

                            $('#table').append(html);

                            // j++;
                            // alert(val.product_name);
                        });

                    });                
                }
            }


        });
    </script>

</html>
