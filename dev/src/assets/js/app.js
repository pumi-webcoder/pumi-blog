// jQuery(document).ready(function () {

window.onload = function () {
  const loading = document.querySelector(".p-loading__bg");
  const firstSection = document.querySelector(".js-first-section");
  const firstContainer = document.querySelector(".js-first-container");
  const secondSection = document.querySelector(".js-second-section");
  const secondContainer = document.querySelector(".js-second-container");

  const tl = gsap.timeline();

  // １秒待ってからアニメーションを開始
  setTimeout(function () {
    tl.fromTo(loading, 1, { x: "0" }, { x: "100%", ease: "power2.easeInOut" }, "+=1.0")
      .fromTo(firstSection, 0.5, { y: "30%", opacity: "0" }, { y: "0%", opacity: "1" })
      .fromTo(firstContainer, 0.5, { opacity: "0" }, { opacity: "1" })
      .fromTo(secondSection, 0.5, { y: "30%", opacity: "0" }, { y: "0%", opacity: "1" })
      .fromTo(secondContainer, 0.5, { opacity: "0" }, { opacity: "1" })
      .fromTo(firstSection, 0.5, { width: "100%" }, { width: "90%" })
      .fromTo(secondSection, 0.5, { width: "100%" }, { width: "90%" }, "-=0.5")

      // 最後にloading要素を非表示にする
      .to(loading, { display: "none", duration: 0 });
  }, 1000);
};
