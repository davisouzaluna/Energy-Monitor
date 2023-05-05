function generateMACAddress() {
    let mac = "00";
    for (let i = 0; i < 5; i++) {
      mac += ":" + Math.floor(Math.random() * 255).toString(16).padStart(2, "0");
    }
    return mac.toUpperCase();
  }
  
  console.log(generateMACAddress());