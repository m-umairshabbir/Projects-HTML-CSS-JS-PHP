function otpGenerate() {
  let optShow = document.getElementById('otp');
  let digits = '0123456789';
  let otp = '';
  for (let i = 0; i < 4; i++) {
    otp += digits[Math.floor(Math.random() * 10)];
  }

  optShow.innerHTML = '<span></span>';
  setTimeout(() => {
    optShow.innerHTML = otp;
  }, 1000);
}

// End JavaSript
