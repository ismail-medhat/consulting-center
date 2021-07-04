<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Course Payment Preview
        </h2>
    </x-slot>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


    <style>
        .StripeElement {
            box-sizing: border-box;
            height: 40px;
            width: 100%;
            padding: 10px 12px;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>




    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="container text-center p-3">


                    <div class="col-md-12">
                        <div class="row" style="border-radius: 20px;box-shadow: 4px 4px 10px #dddada;">
                            <div class="col-md-6" style="border-right: 2px solid #DDD;padding-top: 20px;">
                                <img src="{{ asset($course_info->photo) }}" style="height: 180px;float: left;"
                                    class="img-thumbnail">
                                <div style="margin-left:0px; ">
                                    <h3>{{ $course_info->en_name }}</h3>
                                    <h3>{{ $course_info->ar_name }}</h3>
                                    <span style="font-size: 22px;display: block;"><i class="far fa-usd-circle "
                                            style="color: red;"></i> {{ $course_info->price }} EGP</span>
                                    <span style="font-size: 22px;display: block;"><i class="far fa-clock"
                                            style="color: rgb(51, 255, 0);"></i> {{ $course_info->hour_number }}
                                        Hours</span>
                                    <span style="font-size: 22px;display: block;"><i class="fal fa-calendar-day"
                                            style="color: rgb(0, 183, 255);"></i> {{ $course_info->day_number }}
                                        Days</span>
                                </div>
                                <hr>

                                <div class="text-center">
                                    <h3>Arabic Description</h3>
                                    <p>{!! $course_info->ar_description !!}</p>
                                </div>

                            </div>

                            <div class="col-md-6" style="padding-top: 20px;">

                                <h3 class="text-center" style="padding:5px;color:#124; ">Payment Final Step</h3>
                                <hr>

                                <form action="{{ route('stripe.charge') }}" method="post" id="payment-form">
                                    @csrf
                                    <div class="form-row">
                                        <label for="card-element">
                                            Credit or debit card
                                        </label>
                                        <div id="card-element">
                                        </div>

                                        <div id="card-errors" role="alert">
                                        </div>
                                    </div>
                                    <br>

                                    <input type="hidden" name="course_id" value="{{ $course_info->id }}">
                                    <input type="hidden" name="course_price" value="{{ $course_info->price }}">
                                    <input type="hidden" name="course_name" value="{{ $course_info->en_name }}">
                                    <input type="hidden" name="student_name" value="{{ $course_info->en_full_name }}">
                                    <input type="hidden" name="student_email" value="{{ $course_info->email }}">
                                    <input type="hidden" name="student_phone" value="{{ $course_info->phone }}">


                                    <button class="btn btn-info" type="submit"><i class="fab fa-paypal"></i> Pay
                                        Now</button>

                                </form>


                            </div>


                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>




    <script>
        var stripe = Stripe(
            'pk_test_51IhZfEC5a5un6YA8jSgxva2BLHEpBuwKP7Qcg4eXrvoUv3g6aA43EQ4OzvbujkbOvBw6kZXAdSS8zGhaZnJlcSHT00Phz0I1Md'
        );

        var elements = stripe.elements();

        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4',
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a',
            }
        };

        var card = elements.create('card', {
            style: style
        });

        card.mount('#card-element');

        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    stripeTokenHandler(result.token);
                }
            });
        });

        function stripeTokenHandler(token) {
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            form.submit();
        }

    </script>



</x-app-layout>