function openWhatsApp() {
    // Ganti nomor telepon berikut dengan nomor tujuan yang diinginkan
    var phoneNumber = "628889187858";

    // Ganti pesan berikut dengan pesan yang ingin Anda kirimkan
    var message = "Halo! Saya tertarik dengan layanan catering Anda.";

    // Buat tautan WhatsApp dengan nomor tujuan dan pesan
    var url = "https://api.whatsapp.com/send?phone=" + phoneNumber + "&text=" + encodeURIComponent(message);

    // Buka tautan WhatsApp dalam tab baru
    window.open(url, "_blank");
  }

  