console.log("rooms");

const translateTexts = () => {
  let translatedText = "";
  let originalText = "";

  const text1 = document.querySelector(".post-index > span");
  originalText = text1?.textContent || "";
  translatedText = originalText.replace("Show", "Mostrando");
  translatedText = translatedText.replace("of", "de");
  if (text1) text1.textContent = translatedText;
};

const init = () => {
  translateTexts();
};

init();

document.querySelector(".footer-galeria").style.backgroundColor = "white";
