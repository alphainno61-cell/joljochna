@extends('layouts')

@section('content')
    <!-- HERO SECTION -->
    <div
        class="hero d-flex flex-column justify-content-center align-items-center text-center gap-3 py-5 bg-success text-white">
        <h1 class="display-4 fw-bold">আমাদের সম্পর্কে</h1>
        <h5 class="fw-light fst-italic">“আমাদের লক্ষ্য শুধুই সেবা নয়, বরং সমাজের উন্নয়নে অবদান রাখা।”</h5>
        <h5 class="fw-light fst-italic">“প্রতিটি পদক্ষেপ আমরা বিশ্বাস ও মানের ভিত্তিতে এগিয়ে নিই, যাতে গ্রাহকরা পায় সেরা
            অভিজ্ঞতা।”</h5>
    </div>

    <!-- HISTORY SECTION -->
    <section class="history-section bg-light px-5 py-1">
        <h2 class="history-title text-center fw-bold mb-5 mt-3">আমাদের ইতিহাস</h2>
        <div class="">
            <div class="row align-items-center">
                <!-- Text -->
                <div class="col-lg-6 col-md-12">
                    <p class="fs-5 lh-lg">
                        আমাদের সংস্থা ২০০৫ সালে শুরু হয়েছিল। ছোট একটি দল দিয়ে শুরু হলেও আমরা আজ একটি শক্তিশালী দল ও আধুনিক
                        প্রযুক্তির সাহায্যে সারা দেশের গ্রাহকদের সেবা দিচ্ছি। আমাদের মূল উদ্দেশ্য হলো মানসম্মত সেবা প্রদান
                        এবং
                        সমাজে ইতিবাচক প্রভাব ফেলা।
                    </p>
                    <p class="fs-5 lh-lg">
                        সময়ের সঙ্গে সঙ্গে আমরা নতুন নতুন উদ্যোগ নিয়েছি, গ্রাহকদের চাহিদা অনুযায়ী সমাধান করেছি এবং আমাদের
                        সেবা সম্প্রসারণ করেছি। প্রতিটি চ্যালেঞ্জকে আমরা একটি নতুন সুযোগ হিসেবে গ্রহণ করেছি।
                    </p>
                </div>

                <!-- Cards -->
                <div class="col-lg-6 col-md-12">
                    <div class="card mb-4 shadow-sm border-0 rounded-3 p-3">
                        <h5 class="fw-bold">প্রথম সাফল্য</h5>
                        <p>২০০৭ সালে আমাদের প্রথম বড় প্রকল্প সম্পন্ন হয়, যা আমাদের জন্য একটি গুরুত্বপূর্ণ মাইলফলক।</p>
                    </div>
                    <div class="card shadow-sm border-0 rounded-3 p-3">
                        <h5 class="fw-bold">প্রসারিত উদ্যোগ</h5>
                        <p>২০১৫ সালে আমরা নতুন শহরে সেবা শুরু করি, এবং গ্রাহকদের সঠিক সমাধান দিতে সক্ষম হই।</p>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- MISSION & VISION SECTION -->
    <section class="mx-5">
        <div class="row align-items-center" style="min-height: 450px;">

            <!-- TOP LEFT: Mission -->
            <div class="col-lg-4 order-lg-1 d-flex align-items-start">
                <div class="bg-light p-4 rounded-4 shadow-sm w-100">
                    <h3 class="fw-semibold fs-4 mb-3 text-success">আমাদের মিশন</h3>
                    <p class="fs-5 lh-lg mb-0">
                        আমরা গ্রাহকদের জন্য সেরা রিয়েল এস্টেট সমাধান প্রদান করি, যাতে তারা তাদের পছন্দের বাড়ি সহজেই খুঁজে
                        পান।
                        আমাদের লক্ষ্য হলো গ্রাহকদের সাথে স্বচ্ছতা এবং বিশ্বাসের ভিত্তিতে কাজ করা।
                    </p>
                </div>
            </div>

            <!-- MIDDLE: Image -->
            <div class="col-lg-4 order-lg-2 d-flex justify-content-center">
                <img src="https://www.metallbau-frueh.com/fileadmin/_processed_/f/5/csm_albion-riverside-london-01_749393cfb9.jpg"
                    alt="জলজোছনা" class="img-fluid rounded w-100"
                    style="max-height: 750px; object-fit: cover; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
            </div>

            <!-- BOTTOM RIGHT: Vision -->
            <div class="col-lg-4 order-lg-3 d-flex align-items-end">
                <div class="bg-light p-4 rounded-4 shadow-sm w-100 mt-auto">
                    <h3 class="fw-semibold fs-4 mb-3 text-success">আমাদের ভিশন</h3>
                    <p class="fs-5 lh-lg mb-0">
                        বাংলাদেশের শীর্ষ রিয়েল এস্টেট প্ল্যাটফর্ম হয়ে উঠা, যেখানে গ্রাহকের সন্তুষ্টি সর্বোচ্চ অগ্রাধিকার।
                        আমরা ভবিষ্যতে আরও উন্নত প্রযুক্তি এবং সেবা প্রদানের মাধ্যমে গ্রাহকদের জীবনকে সহজ করতে চাই।
                    </p>
                </div>
            </div>

        </div>
    </section>



    <!-- FOUNDER SECTION -->
    <section class="founder-section bg-light">
        <div class="container">
            <h2 class="text-center fw-bold text-success mb-5">আমাদের প্রতিষ্ঠাতা</h2>

            <!-- Founder 1 -->
   <section class="container my-5">
  <div class="row align-items-stretch bg-light p-4 rounded-4 shadow-sm">

    <!-- Left Side: Founder Image -->
    <div class="col-lg-6 mb-4 mb-lg-0">
      <img
        src="https://plus.unsplash.com/premium_photo-1661331747255-25854e79d9b6?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8Zm91bmRlcnxlbnwwfHwwfHx8MA%3D%3D&fm=jpg&q=60&w=3000"
        alt="Founder"
        class="img-fluid rounded w-100 h-100"
        style="max-height: 500px; object-fit: cover; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
    </div>

    <!-- Right Side: Founder Info -->
    <div class="col-lg-6 d-flex flex-column justify-content-center text-start" style="max-height: 500px; overflow-y: auto;">
      <h5 class="text-success fw-bold mb-3">আমাদের প্রতিষ্ঠাতা</h5>

      <h3 class="fw-semibold text-dark mb-1">মারুফ সাত্তার আলী</h3>
      <p class="text-primary fs-6 mb-3">প্রতিষ্ঠাতা, জলজোছনা</p>

      <p class="fs-6 lh-lg text-secondary mb-3">
        জনাব মারুফ সাত্তার আলী একজন উদ্ভাবক ও সমাজসেবক, যিনি আমাদের সংস্থাকে তার দৃষ্টিভঙ্গি ও নেতৃত্বের মাধ্যমে গড়ে তুলেছেন।
        তার নেতৃত্বে আমরা বাংলাদেশের রিয়েল এস্টেট খাতে স্বচ্ছতা, প্রযুক্তি এবং বিশ্বাসের নতুন যুগের সূচনা করেছি।
      </p>

      <p class="fs-6 lh-lg text-secondary mb-3">
        তিনি বিশ্বাস করেন, একটি স্বপ্নের বাড়ি শুধু একটি স্থাপনা নয়, বরং একটি সুখী ও শান্তিপূর্ণ জীবনের প্রতীক।
        তিনি আমাদের সংস্থার প্রতিটি উদ্যোগে মান, নৈতিকতা এবং উদ্ভাবনকে অগ্রাধিকার দেন।
      </p>

      <p class="fs-6 lh-lg text-secondary mb-0">
        তিনি প্রতিটি কর্মচারী এবং গ্রাহকের সঙ্গে সুদৃঢ় সম্পর্ক গড়ে তোলার গুরুত্বে বিশ্বাসী।
        তার স্বপ্ন হলো একটি বাংলাদেশ যেখানে মানুষ কেবল তাদের বাড়ি নয়, বরং নিরাপত্তা, আরাম এবং স্বপ্ন পূরণের সুযোগও পায়।
      </p>
    </div>

  </div>
</section>




            <!-- Founder 2 (Alternate layout: image right) -->
<section class="container my-5">
  <div class="row align-items-stretch bg-light p-4 rounded-4 shadow-sm flex-lg-row-reverse">

    <!-- Right Side: Chairman Image -->
    <div class="col-lg-6 mb-4 mb-lg-0">
      <img
        src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=60"
        alt="Chairman"
        class="img-fluid rounded w-100 h-100"
        style="max-height: 500px; object-fit: cover; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
    </div>

    <!-- Left Side: Chairman Info -->
    <div class="col-lg-6 d-flex flex-column justify-content-center text-start" style="max-height: 500px; overflow-y: auto;">
      <h5 class="text-success fw-bold mb-3">আমাদের চেয়ারম্যান</h5>

      <p class="fs-6 lh-lg text-secondary mb-3">
        জনাব আব্দুল করিম একজন দূরদর্শী ব্যবসায়ী ও সমাজসেবক, যিনি তাঁর অনন্য নেতৃত্ব ও নিষ্ঠার মাধ্যমে আমাদের প্রতিষ্ঠানকে সাফল্যের উচ্চ শিখরে পৌঁছে দিয়েছেন।
        তিনি বিশ্বাস করেন, একটি উন্নত সমাজ গড়ে তুলতে সৎ উদ্যোগ ও মানবিক মূল্যবোধের বিকল্প নেই।
      </p>

      <p class="fs-6 lh-lg text-secondary mb-3">
        তাঁর নেতৃত্বে “জলজোছনা” শুধুমাত্র একটি রিয়েল এস্টেট প্রকল্প নয় — এটি একটি স্বপ্ন, যেখানে প্রতিটি পরিবার পাবে
        নিরাপদ, আরামদায়ক এবং সুন্দর জীবনযাপনের নিশ্চয়তা।
      </p>

      <p class="fs-6 lh-lg text-secondary mb-4">
        তিনি সর্বদা সমাজের প্রান্তিক মানুষের পাশে থাকার প্রতিশ্রুতি দেন এবং বিশ্বাস করেন যে উন্নয়নের মূল হলো মানবিকতা ও সততা।
      </p>

      <h4 class="fw-semibold text-dark mb-1">আব্দুল করিম</h4>
      <p class="text-primary fs-6 mb-1">চেয়ারম্যান</p>
      <p class="fs-6 text-secondary">জলজোছনা</p>
    </div>

  </div>
</section>

        </div>
    </section>
@endsection
