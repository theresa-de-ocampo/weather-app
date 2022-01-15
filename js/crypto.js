// jshint esversion: 6
let crypto = {
	key: "Gwen Stacy died in Spider-Man 3",
	encrypt: function(plaintext) {
		let cipher = CryptoJS.AES.encrypt(plaintext, this.key);
		return cipher.toString();
	},
	decrypt: function(ciphertext) {
		let plaintext = CryptoJS.AES.decrypt(ciphertext, this.key);
		return plaintext.toString(CryptoJS.enc.Utf8);
	}
};