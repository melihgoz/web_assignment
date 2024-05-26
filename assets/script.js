document.addEventListener("DOMContentLoaded", function() {
    var kayitFormu = document.getElementById("registerForm");
    if (kayitFormu) {
        kayitFormu.addEventListener("submit", handleKayitFormuSubmit);
    }

    var iletisimFormu = document.getElementById("contactForm");
    if (iletisimFormu) {
        iletisimFormu.addEventListener("submit", handleIletisimFormuSubmit);
    }
});

function handleIletisimFormuSubmit(event) {
    event.preventDefault();

    var isimSoyisim = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var mesaj = document.getElementById("message").value;

    if (isimSoyisim === "" || email === "" || mesaj === "") {
        alert("Lütfen tüm alanları doldurun.");
        return;
    }

    if (!validateEmail(email)) {
        alert("Geçersiz e-mail adresi.");
        return;
    }

    if (mesaj.length > 300) {
        alert("Mesaj 300 karakterden fazla olamaz.");
        return;
    }

    var veri = {
        isimSoyisim: isimSoyisim,
        email: email,
        mesaj: mesaj
    };

    fetch('/api/iletisim', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(veri)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Form gönderilirken bir hata oluştu.');
        }
        alert('Mesaj başarıyla gönderildi.');
    })
    .catch(error => {
        console.error('Hata:', error);
        alert('Form gönderilirken bir hata oluştu.');
    });
}

function validateEmail(email) {
    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

function handleKayitFormuSubmit(event) {
    event.preventDefault();

    var kullaniciAdi = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var sifre = document.getElementById("password_1").value;
    var sifreTekrar = document.getElementById("password_2").value;

    if (sifre !== sifreTekrar) {
        alert("Şifreler eşleşmiyor!");
        return;
    }

    var veri = {
        kullaniciAdi: kullaniciAdi,
        email: email,
        sifre: sifre
    };

    fetch('/api/register', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(veri)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Kayıt yapılırken bir hata oluştu.');
        }
        alert('Kayıt başarıyla tamamlandı.');
    })
    .catch(error => {
        console.error('Hata:', error);
        alert('Kayıt yapılırken bir hata oluştu.');
    });
}
