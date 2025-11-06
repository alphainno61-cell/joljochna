   <section id="contact" class="contact">
       <h2 class="section-title">যোগাযোগ করুন</h2>
       <p class="section-subtitle">আমরা আপনার সেবায় প্রস্তুত</p>
       <div class="contact-content">
           <div class="contact-info">
               <div class="contact-item">
                   <div class="contact-icon">📞</div>
                   <div class="contact-details">
                       <h3>ফোন</h3>
                       <p>+880 1991 995 995<br>+880 1991 994 994<br>+880 1997 995 995<br>+880 1677 600 000</p>
                   </div>
               </div>
               <div class="contact-item">
                   <div class="contact-icon">📧</div>
                   <div class="contact-details">
                       <h3>ইমেইল</h3>
                       <p>hello.nexgroup@gmail.com</p>
                   </div>
               </div>
               <div class="contact-item">
                   <div class="contact-icon">🌐</div>
                   <div class="contact-details">
                       <h3>ওয়েবসাইট</h3>
                       <p>www.joljochna.com</p>
                   </div>
               </div>
               <div class="contact-item">
                   <div class="contact-icon">📍</div>
                   <div class="contact-details">
                       <h3>ঠিকানা</h3>
                       <p>শুভনূর ৩৮৮ বাড়ি সিদ্ধার্থ এস আবাস<br>খুলনা, বাংলাদেশ</p>
                   </div>
               </div>
           </div>

           <div class="contact-form">
               <h3 style="margin-bottom: 2rem;">বুকিং তথ্য পাঠান</h3>

               @if (session('success'))
                   <div class="alert alert-success alert-dismissible fade show" role="alert">
                       <i class="fas fa-check-circle me-2"></i>
                       {{ session('success') }}
                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div>
               @endif

               @if (session('error'))
                   <div class="alert alert-danger alert-dismissible fade show" role="alert">
                       <i class="fas fa-exclamation-triangle me-2"></i>
                       {{ session('error') }}
                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div>
               @endif

               <form action="{{ route('bookings.store') }}" method="POST">
                   @csrf

                   <div class="form-group">
                       <label for="name">নাম *</label>
                       <input type="text" id="name" name="name" placeholder="আপনার নাম লিখুন"
                           value="{{ old('name') }}" required>
                       @error('name')
                           <small class="text-danger">{{ $message }}</small>
                       @enderror
                   </div>

                   <div class="form-group">
                       <label for="phone">ফোন নম্বর *</label>
                       <input type="tel" id="phone" name="phone" placeholder="আপনার ফোন নম্বর"
                           value="{{ old('phone') }}" required>
                       @error('phone')
                           <small class="text-danger">{{ $message }}</small>
                       @enderror
                   </div>

                   <div class="form-group">
                       <label for="email">ইমেইল *</label>
                       <input type="email" id="email" name="email" placeholder="আপনার ইমেইল ঠিকানা"
                           value="{{ old('email') }}" required>
                       @error('email')
                           <small class="text-danger">{{ $message }}</small>
                       @enderror
                   </div>

                   <div class="form-group">
                       <label for="plot_size">আগ্রহের প্লট সাইজ</label>
                       <select id="plot_size" name="plot_size" class="form-control">
                           <option value="">প্লট সাইজ নির্বাচন করুন</option>
                           <option value="২০ কুড়া মালা (২.৫ কাঠা)"
                               {{ old('plot_size') == '২০ কুড়া মালা (২.৫ কাঠা)' ? 'selected' : '' }}>২০ কুড়া মালা (২.৫
                               কাঠা)</option>
                           <option value="৩০ কুড়া মালা (৩.৭৫ কাঠা)"
                               {{ old('plot_size') == '৩০ কুড়া মালা (৩.৭৫ কাঠা)' ? 'selected' : '' }}>৩০ কুড়া মালা
                               (৩.৭৫ কাঠা)</option>
                           <option value="৪০ কুড়া মালা (৫ কাঠা)"
                               {{ old('plot_size') == '৪০ কুড়া মালা (৫ কাঠা)' ? 'selected' : '' }}>৪০ কুড়া মালা (৫
                               কাঠা)</option>
                           <option value="অন্যান্য" {{ old('plot_size') == 'অন্যান্য' ? 'selected' : '' }}>অন্যান্য
                           </option>
                       </select>
                       @error('plot_size')
                           <small class="text-danger">{{ $message }}</small>
                       @enderror
                   </div>

                   <div class="form-group">
                       <label for="message">বার্তা</label>
                       <textarea id="message" name="message" rows="4" placeholder="আপনার প্রশ্ন বা মন্তব্য">{{ old('message') }}</textarea>
                       @error('message')
                           <small class="text-danger">{{ $message }}</small>
                       @enderror
                   </div>

                   <button type="submit" class="btn btn-primary" style="width: 100%;">
                       <i class="fas fa-paper-plane me-2"></i>পাঠান
                   </button>
               </form>
           </div>
       </div>
   </section>
