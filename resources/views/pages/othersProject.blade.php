@extends('layouts')

@section('content')
 <style>
    body {
      font-family: 'Noto Sans Bengali', sans-serif;
      color: #222;
      margin: 0;
      overflow-x: hidden;
    }

    /* Hero Section */
    .hero-section {
      height: 100vh;
      background: linear-gradient(to right, rgba(10, 77, 46, 0.8), rgba(10, 77, 46, 0.3)), url('https://images.unsplash.com/photo-1505691938895-1758d7feb511?auto=format&fit=crop&w=1500&q=80') center/cover no-repeat;
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 0 20px;
    }

    .hero-section h1 {
      font-size: 3rem;
      font-weight: 700;
    }

    .hero-section p {
      font-size: 1.3rem;
      margin-top: 10px;
      max-width: 700px;
    }

    /* Introduction Section */
    .intro-section {
      background-color: #f9f9f9;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 80px 10%;
      flex-wrap: wrap;
    }

    .intro-section img {
      width: 180px;
      border-radius: 10px;
    }

    .intro-section .text-content {
      max-width: 600px;
    }

    .intro-section h2 {
      font-size: 2.2rem;
      color: #0a4d2e;
      margin-bottom: 20px;
    }

    /* Title for Projects */
    .section-title {
      text-align: center;
      font-size: 2.5rem;
      color: #0a4d2e;
      margin: 80px 0 40px;
      font-weight: bold;
    }

    /* Project Section Layout */
    .project-section {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 80vh;
      padding: 60px 10%;
      flex-wrap: wrap;
    }

    .project-section:nth-child(even) {
      background-color: #f8f8f8;
    }

    .project-image {
      flex: 1;
      background-size: cover;
      background-position: center;
      min-height: 400px;
      border-radius: 20px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    .project-content {
      flex: 1;
      padding: 40px;
    }

    .project-content h3 {
      color: #0a4d2e;
      font-size: 2rem;
      margin-bottom: 15px;
    }

    .project-content p {
      font-size: 1.1rem;
      margin-bottom: 20px;
      line-height: 1.8;
    }

    .project-content .btn {
      background-color: #0a4d2e;
      color: #fff;
      padding: 10px 25px;
      border-radius: 8px;
      font-weight: 500;
      transition: 0.3s;
    }

    .project-content .btn:hover {
      background-color: #085737;
    }

    footer {
      background-color: #0a4d2e;
      color: #fff;
      text-align: center;
      padding: 20px 0;
      margin-top: 80px;
    }

    @media (max-width: 992px) {
      .project-section {
        flex-direction: column;
        text-align: center;
      }
      .project-content {
        padding: 20px;
      }
      .project-image {
        width: 100%;
        margin-bottom: 30px;
      }
    }
  </style>
  <!-- Hero Section -->
  <section class="hero-section">
    <h1>আমাদের অন্যান্য প্রকল্প</h1>
    <p>নেক্স রিয়েল এস্টেট এর অসাধারণ কিছু প্রকল্পের এক ঝলক।</p>
  </section>

  <!-- Intro Section -->
  <section class="intro-section">
    <img src="https://cdn-icons-png.flaticon.com/512/3256/3256013.png" alt="Logo">
    <div class="text-content">
      <h2>বিশ্বাসের প্রতীক NEX Real Estate</h2>
      <p>আমরা বাংলাদেশে প্রিমিয়াম রিয়েল এস্টেট উন্নয়নে কাজ করছি। উন্নত মান, আইনি নিশ্চয়তা এবং আধুনিক সুবিধা দিয়ে প্রতিটি প্রকল্প তৈরি করা হয়েছে আপনার জীবনকে সুন্দর ও নিরাপদ করতে।</p>
    </div>
  </section>

  <!-- Title -->
  <h2 class="section-title">Some of Our Incredible Projects</h2>

  <!-- Project 1 -->
  <section class="project-section">
    <div class="project-image" style="background-image: url('https://images.unsplash.com/photo-1501183638710-841dd1904471?auto=format&fit=crop&w=1500&q=80');"></div>
    <div class="project-content">
      <h3>শান্তি নিবাস</h3>
      <p>ঢাকার প্রাণকেন্দ্রে অবস্থিত শান্তি নিবাস, একটি আধুনিক ও বিলাসবহুল আবাসিক প্রকল্প। উন্নত যোগাযোগ ব্যবস্থা ও সবুজ পরিবেশে এটি একটি নিখুঁত ঠিকানা।</p>
      <a href="#" class="btn">বিস্তারিত জানুন</a>
    </div>
  </section>

  <!-- Project 2 (Reverse Layout) -->
  <section class="project-section">
    <div class="project-content">
      <h3>সবুজ ভিটা</h3>
      <p>নদীর তীরে অবস্থিত "সবুজ ভিটা" প্রকৃতি প্রেমীদের জন্য স্বর্গ। এখানে আপনি পাবেন নির্মল বাতাস, সবুজ ছায়া, এবং শহরের কোলাহল থেকে দূরে এক প্রশান্ত জীবন।</p>
      <a href="#" class="btn">বিস্তারিত জানুন</a>
    </div>
    <div class="project-image" style="background-image: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1500&q=80');"></div>
  </section>

  <!-- Project 3 -->
  <section class="project-section">
    <div class="project-image" style="background-image: url('https://images.unsplash.com/photo-1493809842364-78817add7ffb?auto=format&fit=crop&w=1500&q=80');"></div>
    <div class="project-content">
      <h3>প্রত্যাশা টাওয়ার</h3>
      <p>খুলনার সেরা লোকেশনে নির্মিত এই অফিস টাওয়ারটি ব্যবসার জন্য উপযুক্ত। আধুনিক ডিজাইন, প্রশস্ত পার্কিং, এবং শক্তিশালী নিরাপত্তা ব্যবস্থা এটিকে করে তুলেছে আদর্শ।</p>
      <a href="#" class="btn">বিস্তারিত জানুন</a>
    </div>
  </section>

  <!-- Project 4 (Reverse Layout) -->
  <section class="project-section">
    <div class="project-content">
      <h3>নির্মাণ প্লাজা</h3>
      <p>বাণিজ্যিক দিক থেকে গুরুত্বপূর্ণ এই প্রকল্পে রয়েছে আধুনিক দোকানঘর ও অফিস স্পেস। টেকসই নির্মাণ ও নিরাপদ বিনিয়োগের জন্য এটি অন্যতম সেরা পছন্দ।</p>
      <a href="#" class="btn">বিস্তারিত জানুন</a>
    </div>
    <div class="project-image" style="background-image: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1500&q=80');"></div>
  </section>

    <!-- Project Slider Section -->
  <section class="project-slider-section py-5">
    <div class="container-fluid">
      <h2 class="text-center mb-4" style="color:#0a4d2e; font-weight:700;">Explore More Projects</h2>
      <div class="slider-container">
        <div class="slider-track">
          <div class="slide">
            <img src="https://images.unsplash.com/photo-1501183638710-841dd1904471?auto=format&fit=crop&w=1500&q=80" alt="Project 1">
            <div class="slide-overlay">শান্তি নিবাস</div>
          </div>
          <div class="slide">
            <img src="https://images.unsplash.com/photo-16005851543-be406161a56a0c?auto=format&fit=crop&w=1500&q=80" alt="Project 2">
            <div class="slide-overlay">সবুজ ভিটা</div>
          </div>
          <div class="slide">
            <img src="https://images.unsplash.com/photo-1493809842364-78817add7ffb?auto=format&fit=crop&w=1500&q=80" alt="Project 3">
            <div class="slide-overlay">প্রত্যাশা টাওয়ার</div>
          </div>
          <div class="slide">
            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1500&q=80" alt="Project 4">
            <div class="slide-overlay">নির্মাণ প্লাজা</div>
          </div>
          <div class="slide">
            <img src="https://images.unsplash.com/photo-1560185127-6ed189bf04bb?auto=format&fit=crop&w=1500&q=80" alt="Project 5">
            <div class="slide-overlay">গোল্ডেন হেভেন</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    const slider = document.querySelector('.slider-container');
    const track = document.querySelector('.slider-track');

    let isDown = false;
    let startX;
    let scrollLeft;

    slider.addEventListener('mousedown', (e) => {
      isDown = true;
      slider.classList.add('active');
      startX = e.pageX - slider.offsetLeft;
      scrollLeft = slider.scrollLeft;
    });

    slider.addEventListener('mouseleave', () => {
      isDown = false;
      slider.classList.remove('active');
    });

    slider.addEventListener('mouseup', () => {
      isDown = false;
      slider.classList.remove('active');
    });

    slider.addEventListener('mousemove', (e) => {
      if (!isDown) return;
      e.preventDefault();
      const x = e.pageX - slider.offsetLeft;
      const walk = (x - startX) * 2; // scroll speed
      slider.scrollLeft = scrollLeft - walk;
    });
  </script>

  <style>
    .project-slider-section {
      background-color: #f9f9f9;
    }

    .slider-container {
      overflow-x: scroll;
      overflow-y: hidden;
      cursor: grab;
      scroll-behavior: smooth;
      white-space: nowrap;
      user-select: none;
    }

    .slider-container.active {
      cursor: grabbing;
    }

    .slider-track {
      display: flex;
      gap: 20px;
      padding: 10px 50px;
    }

    .slide {
      position: relative;
      min-width: 350px;
      height: 220px;
      border-radius: 15px;
      overflow: hidden;
      transition: transform 0.3s ease;
      flex-shrink: 0;
    }

    .slide img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 15px;
      transition: transform 0.5s ease;
    }

    .slide:hover img {
      transform: scale(1.1);
    }

    .slide-overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background: rgba(10, 77, 46, 0.7);
      color: #fff;
      text-align: center;
      font-weight: 600;
      font-size: 1.2rem;
      padding: 10px;
      border-bottom-left-radius: 15px;
      border-bottom-right-radius: 15px;
    }

    body
    {
      font-family: 'Noto Sans Bengali', sans-serif;
      color: #222;
      margin: 0;
      overflow-x: hidden;
    }

    /* Hero Section */
    .hero-section {
      height: 100vh;
      background: linear-gradient(to right, rgba(10, 77, 46, 0.8), rgba(10, 77, 46, 0.3)), url('https://images.unsplash.com/photo-1505691938895-1758d7feb511?auto=format&fit=crop&w=1500&q=80') center/cover no-repeat;
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 0 20px;
    }

    .hero-section h1 {
      font-size: 3rem;
      font-weight: 700;
    }

    .hero-section p {
      font-size: 1.3rem;
      margin-top: 10px;
      max-width: 700px;
    }

    /* Introduction Section */
    .intro-section {
      background-color: #f9f9f9;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 80px 10%;
      flex-wrap: wrap;
    }

    .intro-section img {
      width: 180px;
      border-radius: 10px;
    }

    .intro-section .text-content {
      max-width: 600px;
    }

    .intro-section h2 {
      font-size: 2.2rem;
      color: #0a4d2e;
      margin-bottom: 20px;
    }

    /* Title for Projects */
    .section-title {
      text-align: center;
      font-size: 2.5rem;
      color: #0a4d2e;
      margin: 80px 0 40px;
      font-weight: bold;
    }

    /* Project Section Layout */
    .project-section {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 80vh;
      padding: 60px 10%;
      flex-wrap: wrap;
    }

    .project-section:nth-child(even) {
      background-color: #f8f8f8;
    }

    .project-image {
      flex: 1;
      background-size: cover;
      background-position: center;
      min-height: 400px;
      border-radius: 20px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    .project-content {
      flex: 1;
      padding: 40px;
    }

    .project-content h3 {
      color: #0a4d2e;
      font-size: 2rem;
      margin-bottom: 15px;
    }

    .project-content p {
      font-size: 1.1rem;
      margin-bottom: 20px;
      line-height: 1.8;
    }

    .project-content .btn {
      background-color: #0a4d2e;
      color: #fff;
      padding: 10px 25px;
      border-radius: 8px;
      font-weight: 500;
      transition: 0.3s;
    }

    .project-content .btn:hover {
      background-color: #085737;
    }

    footer {
      background-color: #0a4d2e;
      color: #fff;
      text-align: center;
      padding: 20px 0;
      margin-top: 80px;
    }

    @media (max-width: 992px) {
      .project-section {
        flex-direction: column;
        text-align: center;
      }
      .project-content {
        padding: 20px;
      }
      .project-image {
        width: 100%;
        margin-bottom: 30px;
      }
    }

    @media (max-width: 768px) {
      .slide {
        min-width: 250px;
        height: 160px;
      }
    }
  </style>
@endsection
