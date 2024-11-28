@extends('frontend.master')

@section('content')
<section class="return-process-section">
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <form action="{{url('/contact-form/store')}}" method="POST" class="return-process-form form-group">
                    @csrf
                    <div class="text-center">
                        <h3 class="return-process-form-title">Contact Us</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-item-wrapper">
                                <label for="name">Name*</label>
                                <input type="text" name="name" value="" placeholder="Your Name*" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-item-wrapper">
                                <label for="phone">Phone*</label>
                                <input type="text" name="phone" value="" placeholder="Your Phone Number*" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-item-wrapper">
                                <label for="email">Email (Optional)</label>
                                <input type="email" name="email" value="" placeholder="Your Email" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-item-wrapper">
                                <label for="subject">Subject (Optional)</label>
                                <input type="text" name="subject" value="" placeholder="Write Subject" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-item-wrapper">
                                <label for="message">Your Message*</label>
                                <textarea name="message" cols="50" rows="5" class="form-control" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="return-process-btn-outer">
                        <button type="submit" id="productReturnProcess" class="return-process-btn-inner">
                            Submit
                        </button>
                    </div>
                </form>                
            </div>
        </div>
    </div>
</section>
@endsection