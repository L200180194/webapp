@extends('layouts.main')
@section('body')

<div class="container shadow-lg p-3 mt-3 mb-5 bg-body rounded">
    <div class="container d-flex justify-content-center">
        <div class="col ">

            <h3 class="text-center">Frequently Question & Answer</h3>
            <div class="m-2" style="text-align: justify;">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Website
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Website Myintern ditujukan khusus untuk perusahaan untuk menangani penambahan lowongan posisi magang dan juga penerimaan peserta magang</div>
                            <div class="text-center">

                                <img src="{{url('/images/MyIntern_home.jpg')}}" class="img-fluid text-center" style="max-width: 30%;" alt="...">
                            </div>
                            <!-- NEW ACCORDION -->
                            <div class="mx-2">
                                <div class="accordion accordion-flush" id="faqweb">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-web1">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-webone" aria-expanded="false" aria-controls="flush-webone">
                                                Accordion Item #1
                                            </button>
                                        </h2>
                                        <div id="flush-webone" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#faqweb">
                                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-webtwo" aria-expanded="false" aria-controls="flush-webtwo">
                                                Accordion Item #2
                                            </button>
                                        </h2>
                                        <div id="flush-webtwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#faqweb">
                                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                                Accordion Item #3
                                            </button>
                                        </h2>
                                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#faqweb">
                                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END NEW ACCORDION -->
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Android
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Aplikasi MyIntern ditujukan untuk Mahasiswa ataupun Fresh Graduate yang akan mendaftar magang di posisi yang diinginkan

                            </div>

                        </div>
                    </div>
                    <!-- <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Accordion Item #3
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

    </div>
</div>


@endsection