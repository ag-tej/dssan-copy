@extends('layouts.user_layout')

@section('content')
    {{-- principal's message section --}}
    <section class="w-11/12 mx-auto mt-16">
        <p data-aos="zoom-in-up" data-aos-duration="500" class="text-xl xs:text-2xl font-semibold text-dwit-blue text-center">
            A MESSAGE FROM PRINCIPAL
        </p>
        <div data-aos="fade-up" data-aos-duration="800" class="mt-8 flex flex-col md:flex-row">
            <div class="md:w-3/5 md:pr-8 md:border-r text-sm text-justify">
                <div class="flex flex-col justify-center items-center sm:float-left sm:mt-2 sm:mr-8 mb-2">
                    <img src="{{ asset('images/images/principal.png') }}" alt="Mr. Bijay Shrestha"
                        class="h-64 object-contain">
                    <p class="mt-1">Mr. Bijay Shrestha, Principal</p>
                </div>
                <p class="text-lg font-medium">Welcome!</p>
                <p class="py-2">
                    On behalf of the UCI Anteaters in Education Alumni Chapter, I welcome you to join this vibrant and vital
                    community. Together, we are directly impacting the
                    future of our nation and the world through education and support of our youth and lifelong learners.
                </p>
                <p class="py-2">
                    The Anteaters in Education alumni network includes over 12,000+ graduates from UCI education programs
                    and degrees, as well as UCI graduates from any major who now work in education or an education-related
                    field.
                </p>
                <p class="py-2">
                    We are extremely proud of all UCI alumni who serve in a myriad of roles in the education community:
                    teachers, school leaders, entrepreneurs, researchers, policymakers, youth advocates, and other
                    professionals. I hope that you stay connected and continue to thrive in your respective fields.
                </p>
                <p class="py-2">
                    I am incredibly honored to serve as president of the UCI Anteaters in Education Alumni Chapter. I highly
                    encourage you to participate and engage with our School of Education community of students, faculty,
                    alumni, and staff who are committed to the growth and development of lifelong learners.
                </p>
                <p class="pt-2">Best Regards,</p>
                <p>Tracy Carmichael, Ph.D.</p>
                <p>President, Anteaters in Education Alumni Chapter</p>
                <p>Chief Innovation Officer, Long Beach City College</p>
                <a href="https://deerwalk.edu.np/sifalschool/" target="blank">
                    <p
                        class="text-sm py-2 px-5 w-fit border border-dwit-blue mt-8 mx-auto active:text-white active:bg-dwit-blue hover:text-white hover:bg-dwit-blue cursor-pointer">
                        MEET OUR FACULTY MEMBERS
                    </p>
                </a>
            </div>
            <div class="mx-auto md:w-2/5 md:pl-8 mt-8 md:mt-0">
                <p class="text-lg font-medium text-center mb-4 text-dwit-blue">Alumni Benefits</p>
                <div class="flex flex-col sm:flex-row md:flex-col gap-8 lg:gap-16 justify-between">
                    <div class="text-justify">
                        <p class="font-semibold sm:text-center md:text-left mb-1">Alumni Meet</p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum amet dolorem quod atque,
                            recusandae numquam adipisci magni sed a molestias, animi fugiat nobis. Voluptatem cum
                            exercitationem impedit eaque quidem dicta! Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Atque sunt vel cupiditate eius reiciendis laudantium. Exercitationem nam fugit natus!
                            Asperiores culpa et, pariatur laborum perferendis iste temporibus facere blanditiis beatae.
                        </p>
                    </div>
                    <div class="text-justify">
                        <p class="font-semibold sm:text-center md:text-left mb-1">Internship</p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi aliquam impedit voluptatem
                            assumenda nesciunt beatae odio reiciendis earum, harum nisi architecto laborum autem ullam sint
                            officiis, similique dignissimos. Labore, eveniet. Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Laudantium quis totam aliquam odit culpa, molestiae quos ea ducimus saepe
                            earum. Quos, eum culpa necessitatibus unde consequuntur sapiente laborum temporibus alias.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- batch section --}}
    <section class="mx-auto text-center my-8 lg:my-16">

        <p data-aos="zoom-in-up" data-aos-duration="1000" class="text-3xl font-semibold text-dwit-blue">OUR ALUMNI</p>
        <div class="w-10/12 mx-auto mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-16">
            @foreach ($batches as $batch)
                <a href="/alumni/{{ $batch->slug }}">
                    <div data-aos="fade-up" data-aos-duration="800">
                        <div class="mx-auto aspect-3/2 object-contain bg-cover rounded-uihalf"
                            style="background-image: url({{ asset('/storage/' . $batch->image) }})">
                        </div>
                        <p class="mt-1 font-medium text-lg">{{ $batch->batch }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
