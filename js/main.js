"use strict";

function disableScroll() {
  var pagePosition = window.scrollY;
  document.body.classList.add("disable-scroll");
  document.body.dataset.position = pagePosition;
  document.body.style.top = -pagePosition + "px";
}

function enableScroll() {
  var pagePosition = parseInt(document.body.dataset.position, 10);
  document.body.style.top = "auto";
  document.body.classList.remove("disable-scroll");
  if (!isNaN(pagePosition)) {
    window.scroll({
      top: pagePosition,
      left: 0,
    });
  }
  document.body.removeAttribute("data-position");
}

var toastTimer = null;
function showToast(message) {
  var toast = document.getElementById("toastMsg");
  if (!toast) return;
  toast.textContent = message;
  toast.classList.add("toast-msg--visible");
  if (toastTimer) clearTimeout(toastTimer);
  toastTimer = setTimeout(function () {
    toast.classList.remove("toast-msg--visible");
  }, 2600);
}

var headerEl = document.querySelector(".header");
var backToTopBtn = document.getElementById("backToTop");

window.addEventListener(
  "scroll",
  function () {
    var curScroll = window.scrollY || document.documentElement.scrollTop;
    if (headerEl) {
      if (curScroll > 30) {
        headerEl.classList.add("header--scrolled");
      } else {
        headerEl.classList.remove("header--scrolled");
      }
    }
    if (backToTopBtn) {
      if (curScroll > 450) {
        backToTopBtn.classList.add("back-to-top--visible");
      } else {
        backToTopBtn.classList.remove("back-to-top--visible");
      }
    }
  },
  { passive: true }
);

if (backToTopBtn) {
  backToTopBtn.addEventListener("click", function () {
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });
}

// Плавное появление блоков при прокрутке
if ("IntersectionObserver" in window) {
  var revealObserver = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add("reveal--active");
        }
      });
    },
    {
      threshold: 0.15,
      rootMargin: "0px 0px -40px 0px",
    }
  );
  document.querySelectorAll(".reveal").forEach(function (el) {
    revealObserver.observe(el);
  });
}

var burger = document.querySelector(".burger");
var menu = document.querySelector(".header__nav");

function closeMenu() {
  if (burger && burger.classList.contains("burger--active")) {
    burger.classList.remove("burger--active");
    burger.setAttribute("aria-expanded", "false");
    if (menu) menu.classList.remove("header__nav--active");
    enableScroll();
  }
}

if (burger) {
  burger.addEventListener("click", function () {
    burger.classList.toggle("burger--active");
    menu.classList.toggle("header__nav--active");

    var isActive = burger.classList.contains("burger--active");
    burger.setAttribute("aria-expanded", isActive ? "true" : "false");

    if (isActive) {
      disableScroll();
    } else {
      enableScroll();
    }
  });

  document.addEventListener("click", function (e) {
    if (
      burger.classList.contains("burger--active") &&
      !e.target.closest(".header__nav") &&
      !e.target.closest(".burger")
    ) {
      closeMenu();
    }
  });
}

document.querySelectorAll(".nav__link").forEach(function (link) {
  link.addEventListener("click", function () {
    closeMenu();
  });
});

document.addEventListener("keydown", function (e) {
  if (e.key === "Escape") {
    closeMenu();
    if (miniCart) miniCart.classList.remove("mini-cart--visible");
    if (prodModalVideo) {
      prodModalVideo.innerHTML = "";
      prodModalVideo.style.display = "none";
    }
  }
});

document.addEventListener("click", function (e) {
  if (e.target.closest(".modal__close") || (e.target.classList.contains("modal") && e.target.classList.contains("is-open"))) {
    if (prodModalVideo) {
      prodModalVideo.innerHTML = "";
      prodModalVideo.style.display = "none";
    }
  }
});

var cartBtn = document.querySelector(".cart__btn");
var miniCart = document.querySelector(".mini-cart");
if (cartBtn && miniCart) {
  cartBtn.addEventListener("click", function () {
    miniCart.classList.toggle("mini-cart--visible");
  });
}
document.addEventListener("click", function (e) {
  if (
    miniCart &&
    !e.target.classList.contains("mini-cart") &&
    !e.target.closest(".mini-cart") &&
    !e.target.classList.contains("cart__btn") &&
    !e.target.closest(".cart__btn")
  ) {
    miniCart.classList.remove("mini-cart--visible");
  }
});
("use strict");

var accordions = document.querySelectorAll(".faq-accordion");
accordions.forEach(function (el) {
  el.addEventListener("click", function (e) {
    var self = e.currentTarget;
    var control = self.querySelector(".faq-accordion__control");
    var content = self.querySelector(".faq-accordion__content");
    self.classList.toggle("open"); 

    if (self.classList.contains("open")) {
      control.setAttribute("aria-expanded", true);
      content.setAttribute("aria-hidden", false);
      content.style.maxHeight = content.scrollHeight + "px";
    } else {
      control.setAttribute("aria-expanded", false);
      content.setAttribute("aria-hidden", true);
      content.style.maxHeight = null;
    }
  });
});

("use strict");
("use strict");

if (typeof ymaps !== "undefined") {
  ymaps.ready(init);
}

function init() {
  if (document.getElementById("map") && typeof ymaps !== "undefined" && ymaps.Map) {
    var myMap = new ymaps.Map("map", {
      center: [55.76, 37.64],
      zoom: 7,
    });
  }
}
("use strict");

function _createForOfIteratorHelper(o, allowArrayLike) {
  var it;
  if (typeof Symbol === "undefined" || o[Symbol.iterator] == null) {
    if (
      Array.isArray(o) ||
      (it = _unsupportedIterableToArray(o)) ||
      (allowArrayLike && o && typeof o.length === "number")
    ) {
      if (it) o = it;
      var i = 0;
      var F = function F() {};
      return {
        s: F,
        n: function n() {
          if (i >= o.length) return { done: true };
          return { done: false, value: o[i++] };
        },
        e: function e(_e) {
          throw _e;
        },
        f: F,
      };
    }
    throw new TypeError(
      "Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."
    );
  }
  var normalCompletion = true,
    didErr = false,
    err;
  return {
    s: function s() {
      it = o[Symbol.iterator]();
    },
    n: function n() {
      var step = it.next();
      normalCompletion = step.done;
      return step;
    },
    e: function e(_e2) {
      didErr = true;
      err = _e2;
    },
    f: function f() {
      try {
        if (!normalCompletion && it["return"] != null) it["return"]();
      } finally {
        if (didErr) throw err;
      }
    },
  };
}

function _unsupportedIterableToArray(o, minLen) {
  if (!o) return;
  if (typeof o === "string") return _arrayLikeToArray(o, minLen);
  var n = Object.prototype.toString.call(o).slice(8, -1);
  if (n === "Object" && o.constructor) n = o.constructor.name;
  if (n === "Map" || n === "Set") return Array.from(o);
  if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))
    return _arrayLikeToArray(o, minLen);
}

function _arrayLikeToArray(arr, len) {
  if (len == null || len > arr.length) len = arr.length;
  for (var i = 0, arr2 = new Array(len); i < len; i++) {
    arr2[i] = arr[i];
  }
  return arr2;
}

var catalogList = document.querySelector(".catalog-list");
var catalogMore = document.querySelector(".catalog__more");
var prodModal = document.querySelector(
  '[data-graph-target="prod-modal"] .modal-content'
);
var prodModalSlider = prodModal.querySelector(".modal-slider .swiper-wrapper");
var prodModalPreview = prodModal.querySelector(".modal-slider .modal-preview");
var prodModalInfo = prodModal.querySelector(".modal-info__wrapper");
var prodModalDescr = prodModal.querySelector(".modal-prod-descr");
var prodModalChars = prodModal.querySelector(".prod-chars");
var prodModalVideo = prodModal.querySelector(".prod-modal__video");
var prodQuantity = (catalogList && catalogList.children.length) ? catalogList.children.length : 6;
var dataLength = window.PRODUCTS_DATA ? window.PRODUCTS_DATA.length : null;
var modal = null;

var normalPrice = function normalPrice(str) {
  return String(str).replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, "$1 ");
};

var prodSlider = new Swiper(".modal-slider__container", {
  slidesPerView: 1,
  spaceBetween: 20,
});

var getProductsData = function () {
  if (window.PRODUCTS_DATA) {
    dataLength = window.PRODUCTS_DATA.length;
    return Promise.resolve(window.PRODUCTS_DATA);
  }
  return fetch("data/data.json")
    .then(function (response) {
      return response.json();
    })
    .then(function (data) {
      window.PRODUCTS_DATA = data;
      dataLength = data.length;
      return data;
    });
};
var price = 0;
var miniCartList = document.querySelector(".mini-cart__list");
var fullPrice = document.querySelector(".mini-cart__summ");
var cartCount = document.querySelector(".cart__count");

var priceWithoutSpaces = function priceWithoutSpaces(str) {
  return str.replace(/\s/g, "");
};

var plusFullPrice = function plusFullPrice(currentPrice) {
  return (price += currentPrice);
};

var minusFullPrice = function minusFullPrice(currentPrice) {
  return (price -= currentPrice);
};

var printFullPrice = function printFullPrice() {
  if (fullPrice) fullPrice.textContent = "".concat(normalPrice(price), " \u0440");
};

var printQuantity = function printQuantity(num) {
  if (cartCount) cartCount.textContent = num;
};

if (catalogList) {
  var initProductInteractions = function initProductInteractions() {
    var productsBtns = document.querySelectorAll(".product__btn");
    productsBtns.forEach(function (el) {
      el.addEventListener(
        "focus",
        function (e) {
          var parent = e.currentTarget.closest(".product__btns");
          if (parent) parent.classList.add("product__btns--active");
        },
        true
      );
      el.addEventListener(
        "blur",
        function (e) {
          var parent = e.currentTarget.closest(".product__btns");
          if (parent) parent.classList.remove("product__btns--active");
        },
        true
      );
    });

    document.querySelectorAll(".product").forEach(function (card) {
      var openBtn = card.querySelector('[data-graph-path="prod-modal"]');
      if (!openBtn) return;
      var imgBox = card.querySelector(".product__image");
      var titleBox = card.querySelector(".product__title");
      [imgBox, titleBox].forEach(function (box) {
        if (box && !box.dataset.hasModal) {
          box.dataset.hasModal = "true";
          box.addEventListener("click", function (e) {
            if (e.target.closest(".product__btns")) return;
            openBtn.click();
          });
        }
      });
    });
    if (typeof cartLogic === "function") {
      cartLogic();
    }
    if (!modal && typeof GraphModal !== "undefined") {
      modal = new GraphModal({
        isOpen: function isOpen(m) {
          if (m.modalContainer.classList.contains("prod-modal")) {
            var prev = m.previousActiveElement;
            var openBtn = prev ? (prev.closest('[data-graph-path="prod-modal"]') || (prev.closest('.product') ? prev.closest('.product').querySelector('[data-graph-path="prod-modal"]') : null)) : null;
            var openBtnId = openBtn ? (openBtn.dataset.id || openBtn.dataset.productId) : (prev && prev.dataset ? prev.dataset.id : 1);
            loadModalData(openBtnId);
            setTimeout(function () {
              if (prodSlider && typeof prodSlider.update === "function") {
                prodSlider.update();
                prodSlider.slideTo(0);
              }
            }, 50);
          }
        },
        isClose: function isClose(m) {
          if (prodModalVideo) {
            prodModalVideo.innerHTML = "";
            prodModalVideo.style.display = "none";
          }
        },
      });
    }
  };

  var activeFilter = {
    minPrice: 0,
    maxPrice: Infinity,
    genders: [],
    sizes: [],
  };

  var getFilteredProducts = function (data) {
    return data.filter(function (item) {
      if (item.price < activeFilter.minPrice || item.price > activeFilter.maxPrice) {
        return false;
      }
      if (activeFilter.genders.length > 0) {
        var itemGender = item.chars && item.chars["Пол"] ? item.chars["Пол"] : "";
        var matchGender = activeFilter.genders.some(function (g) {
          return itemGender === g || itemGender === "Унисекс";
        });
        if (!matchGender) return false;
      }
      if (activeFilter.sizes.length > 0) {
        var matchSize = activeFilter.sizes.some(function (s) {
          return item.sizes && item.sizes.indexOf(s) !== -1;
        });
        if (!matchSize) return false;
      }
      return true;
    });
  };

  var renderProductsList = function (items, quantity) {
    catalogList.innerHTML = "";
    if (items.length === 0) {
      catalogList.innerHTML = '<li class="catalog-list__empty"><p>По заданным параметрам ничего не найдено. Попробуйте сбросить фильтры.</p></li>';
      if (catalogMore) catalogMore.style.display = "none";
      return;
    }
    var themeUri = (typeof sneakmaxData !== "undefined" && sneakmaxData.themeUri) ? sneakmaxData.themeUri : "";
    var spriteUrl = themeUri ? themeUri + "/img/sprite.svg" : "img/sprite.svg";
    var limit = Math.min(items.length, quantity);
    for (var i = 0; i < limit; i++) {
      var item = items[i];
      var imgAttrs = (i === 0) ? ' width="280" height="293" fetchpriority="high"' : ' width="280" height="293" loading="lazy"';
      var imgSrc = item.mainImage || "";
      if (themeUri && imgSrc.indexOf("http") !== 0 && imgSrc.indexOf("/") !== 0) {
        imgSrc = themeUri + "/" + imgSrc.replace(/^\.\//, "");
      }
      var wcId = item.wc_id || item.id;
      var formattedPrice = normalPrice(item.price);
      var oldPriceHtml = item.oldPrice ? '<span class="product__price-old" style="text-decoration:line-through;color:#8e8e8e;font-size:13px;margin-left:8px;">' + normalPrice(item.oldPrice) + ' р</span>' : '';
      var saleBadgeHtml = item.oldPrice ? '<div class="product__badges"><span class="badge-sale">Скидка</span></div>' : '';

      catalogList.innerHTML +=
        '\n\n              <li class="catalog-list__item" data-id="' + wcId + '">\n                <article class="product">\n                  ' + saleBadgeHtml + '\n                  <div class="product__image">\n                    <img src="'
          + imgSrc + '" alt="'
          + item.title + '"'
          + imgAttrs + '>\n                    <div class="product__btns">\n                      <button class="btn-reset product__btn product__btn--view" data-graph-path="prod-modal" data-id="'
          + item.id
          + '" data-tooltip="Просмотр" aria-label="Показать информацию о товаре ' + item.title + '" title="Быстрый просмотр">\n                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">\n                          <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>\n                          <circle cx="12" cy="12" r="3"></circle>\n                        </svg>\n                      </button>\n                      <button class="btn-reset product__btn product__btn--cart add-to-cart-btn ajax_add_to_cart add_to_cart_button" data-id="'
          + item.id + '" data-product_id="' + wcId + '" data-quantity="1" data-tooltip="В корзину" aria-label="Добавить товар в корзину" title="В корзину">\n                        <svg width="19" height="18" viewBox="0 0 20 19" fill="currentColor">\n                          <path d="M20 6.579h-3.396L13.036.319a.608.608 0 00-.858-.225.678.678 0 00-.214.902l3.182 5.583H4.854L8.036.996a.678.678 0 00-.214-.902.608.608 0 00-.858.225L3.396 6.58H0v1.316h1.357l1.587 8.915c.166.934.941 1.611 1.844 1.611h10.424c.902 0 1.678-.677 1.843-1.61l1.588-8.916H20V6.579zm-4.174 9.99a.634.634 0 01-.614.536H4.788c-.301 0-.56-.225-.615-.537L2.628 7.895h14.744l-1.546 8.674z"/>\n                        </svg>\n                      </button>\n                      <button class="btn-reset product__btn product__btn--quick wfcd-quick-buy-btn" data-product_id="'
          + wcId + '" data-product-name="' + item.title + '" data-product-price="' + formattedPrice + ' ₽" data-product-thumb="<img src=\'' + imgSrc + '\' alt=\'\' />" data-tooltip="В 1 клик" aria-label="Купить в 1 клик: ' + item.title + '" title="Купить в 1 клик">\n                        <svg width="19" height="19" viewBox="0 0 24 24" fill="currentColor">\n                          <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>\n                        </svg>\n                      </button>\n                    </div>\n                  </div>\n                  <h3 class="product__title">'
          + item.title
          + '</h3>\n                  <div class="product__price-wrap" style="display:flex;align-items:baseline;gap:8px;">\n                    <span class="product__price">'
          + formattedPrice
          + ' р</span>' + oldPriceHtml + '\n                  </div>\n                </article>\n              </li>\n\n            ';
    }
    if (catalogMore) {
      if (items.length <= limit) {
        catalogMore.style.display = "none";
      } else {
        catalogMore.style.display = "block";
      }
    }
    initProductInteractions();
  };

  var loadProducts = function loadProducts() {
    var quantity =
      arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 6;
    getProductsData().then(function (data) {
      var filtered = getFilteredProducts(data);
      dataLength = filtered.length;
      var catalogCount = document.querySelector(".catalog__count");
      if (catalogCount) {
        var count = filtered.length;
        var words = ["модель", "модели", "моделей"];
        var word =
          words[
            count % 100 > 4 && count % 100 < 20
              ? 2
              : [2, 0, 1, 1, 1, 2][count % 10 < 5 ? Math.abs(count % 10) : 5]
          ];
        catalogCount.textContent = "В наличии " + count + " " + word;
      }
      renderProductsList(filtered, quantity);
    });
  };

  loadProducts(prodQuantity);

  function loadModalData() {
    var id =
      arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;
    var themeUri = (typeof sneakmaxData !== "undefined" && sneakmaxData.themeUri) ? sneakmaxData.themeUri : "";

    getProductsData()
      .then(function (data) {
        prodModalSlider.innerHTML = "";
        prodModalPreview.innerHTML = "";
        prodModalInfo.innerHTML = "";
        prodModalDescr.textContent = "";
        prodModalChars.innerHTML = "";
        prodModalVideo.innerHTML = "";

        var dataItem = data.find(function (item) {
          return item.id == id || item.wc_id == id;
        });

        // Fallback: if not found, use first item
        if (!dataItem && data.length > 0) {
          dataItem = data[0];
        }

        if (dataItem) {
          var galleryImages = (dataItem.gallery && dataItem.gallery.length > 0) ? dataItem.gallery : [dataItem.mainImage];

          var slides = galleryImages.map(function (image, idx) {
            var imgSrc = image;
            if (themeUri && imgSrc.indexOf("http") !== 0 && imgSrc.indexOf("/") !== 0) {
              imgSrc = themeUri + "/" + imgSrc.replace(/^\.\//, "");
            }
            return '\n            <div class="swiper-slide" data-index="'
              .concat(idx, '">\n              <img src="')
              .concat(
                imgSrc,
                '" alt="' + (dataItem.title || '') + '" width="280" height="293">\n            </div>\n          '
              );
          });

          var preview = galleryImages.map(function (image, idx) {
            var imgSrc = image;
            if (themeUri && imgSrc.indexOf("http") !== 0 && imgSrc.indexOf("/") !== 0) {
              imgSrc = themeUri + "/" + imgSrc.replace(/^\.\//, "");
            }
            return '\n            <div class="modal-preview__item '
              .concat(
                idx === 0 ? "modal-preview__item--active" : "",
                '" tabindex="0" data-index="'
              )
              .concat(idx, '">\n              <img src="')
              .concat(
                imgSrc,
                '" alt="">\n            </div>\n          '
              );
          });

          var sizes = (dataItem.sizes || [39, 40, 41, 42, 43]).map(function (size, idx) {
            return '\n            <li class="modal-sizes__item">\n              <button class="btn-reset modal-sizes__btn'.concat(
              idx === 0 ? " modal-sizes__btn--active" : "",
              '">',
              size,
              "</button>\n            </li>\n          "
            );
          });

          prodModalSlider.innerHTML = slides.join("");
          prodModalPreview.innerHTML = preview.join("");

          var vendorVal = (dataItem.chars && dataItem.chars["Артикул"]) ? dataItem.chars["Артикул"] : (dataItem.sku || "SNK-" + String(dataItem.id).padStart(3, '0'));
          var vendorEl = prodModal.querySelector(".modal-vendor-val");
          if (vendorEl) {
            vendorEl.textContent = vendorVal;
          }

          var formattedPrice = normalPrice(dataItem.price);
          var oldPriceHtml = dataItem.oldPrice ? '<span class="modal-info__old-price" style="display:inline-block;margin-left:8px;text-decoration:line-through;color:#8e8e8e;">' + normalPrice(dataItem.oldPrice) + ' р</span>' : '';

          prodModalInfo.innerHTML =
            '\n\n          <h3 class="modal-info__title">'
              .concat(
                dataItem.title,
                '</h3>\n          <div class="modal-info__rate">\n            <img src="' + (themeUri ? themeUri + '/img/star.svg' : 'img/star.svg') + '" alt="Рейтинг 5 из 5">\n            <img src="' + (themeUri ? themeUri + '/img/star.svg' : 'img/star.svg') + '" alt="">\n            <img src="' + (themeUri ? themeUri + '/img/star.svg' : 'img/star.svg') + '" alt="">\n            <img src="' + (themeUri ? themeUri + '/img/star.svg' : 'img/star.svg') + '" alt="">\n            <img src="' + (themeUri ? themeUri + '/img/star.svg' : 'img/star.svg') + '" alt="">\n          </div>\n          <div class="modal-info__sizes">\n            <span class="modal-info__subtitle">Выберите размер</span>\n            <ul class="list-reset modal-info__sizes-list modal-sizes">\n              '
              )
              .concat(
                sizes.join(""),
                '\n            </ul>\n          </div>\n          <div class="modal-info__price">\n            <span class="modal-info__current-price">'
              )
              .concat(
                formattedPrice,
                ' р</span>' + oldPriceHtml + '\n          </div>\n        '
              );

          prodModalDescr.textContent = dataItem.description || "";
          var charsItems = "";
          if (dataItem.chars) {
            Object.keys(dataItem.chars).forEach(function eachKey(key) {
              charsItems += '<p class="prod-bottom__descr prod-chars__item">'
                .concat(key, ": ")
                .concat(dataItem.chars[key], "</p>");
            });
          }
          prodModalChars.innerHTML = charsItems;

          if (dataItem.video) {
            prodModalVideo.style.display = "block";
            prodModalVideo.innerHTML =
              '\n            <iframe src="'.concat(
                dataItem.video,
                '"\n            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"\n            allowfullscreen></iframe>\n          '
              );
          } else {
            prodModalVideo.style.display = "none";
          }

          // Выбор размера в модальном окне
          var sizeBtns = prodModal.querySelectorAll(".modal-sizes__btn");
          sizeBtns.forEach(function (btn) {
            btn.addEventListener("click", function (e) {
              sizeBtns.forEach(function (b) {
                b.classList.remove("modal-sizes__btn--active");
              });
              e.currentTarget.classList.add("modal-sizes__btn--active");
            });
          });

          // Привязка кнопок заказа
          var addBtn = document.getElementById("modalAddToCartBtn");
          if (addBtn) {
            addBtn.dataset.productId = dataItem.wc_id || dataItem.id;
            addBtn.dataset.id = dataItem.id;
            addBtn.onclick = function () {
              var pId = addBtn.dataset.productId || dataItem.id;
              loadCartData(dataItem.id);
              var activeSize = prodModal.querySelector(".modal-sizes__btn--active");
              var sizeText = activeSize ? " (размер " + activeSize.textContent.trim() + ")" : "";
              if (typeof showToast === "function") {
                showToast("Товар добавлен в корзину" + sizeText + "!");
              }
              if (modal) {
                modal.close();
              }
            };
          }

          var buyBtn = document.getElementById("modalQuickBuyBtn");
          if (buyBtn) {
            buyBtn.dataset.productId = dataItem.wc_id || dataItem.id;
            buyBtn.dataset.productName = dataItem.title;
            buyBtn.dataset.productPrice = formattedPrice + " ₽";
            var firstImg = galleryImages[0] || dataItem.mainImage;
            if (themeUri && firstImg.indexOf("http") !== 0 && firstImg.indexOf("/") !== 0) {
              firstImg = themeUri + "/" + firstImg.replace(/^\.\//, "");
            }
            buyBtn.dataset.productThumb = '<img src="' + firstImg + '" alt="" />';
          }
        }
      })
      .then(function () {
        if (prodSlider && typeof prodSlider.update === "function") {
          prodSlider.update();
          prodSlider.slideTo(0);
        }

        prodModalPreview
          .querySelectorAll(".modal-preview__item")
          .forEach(function (el) {
            el.addEventListener("click", function (e) {
              var idx = parseInt(e.currentTarget.dataset.index);
              prodModalPreview
                .querySelectorAll(".modal-preview__item")
                .forEach(function (p) {
                  p.classList.remove("modal-preview__item--active");
                });
              e.currentTarget.classList.add("modal-preview__item--active");
              if (prodSlider && typeof prodSlider.slideTo === "function") {
                prodSlider.slideTo(idx);
              }
            });
          });
      });
  }

  catalogMore.addEventListener("click", function (e) {
    prodQuantity = prodQuantity + 3;
    loadProducts(prodQuantity);
  });
}

var loadCartData = function loadCartData() {
  var id =
    arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;
  getProductsData()
    .then(function (data) {
      var _iterator2 = _createForOfIteratorHelper(data),
        _step2;

      try {
        for (_iterator2.s(); !(_step2 = _iterator2.n()).done; ) {
          var dataItem = _step2.value;

          if (dataItem.id == id) {
            miniCartList.insertAdjacentHTML(
              "afterbegin",
              '\n              <li class="mini-cart__item" data-id="'
                .concat(
                  dataItem.id,
                  '">\n                <article class="mini-cart__product mini-product">\n                  <div class="mini-product__image">\n                    <img src="'
                )
                .concat(dataItem.mainImage, '" alt="')
                .concat(
                  dataItem.title,
                  '">\n                  </div>\n                  <div class="mini-product__content">\n                    <div class="mini-product__text">\n                      <h3 class="mini-product__title">'
                )
                .concat(
                  dataItem.title,
                  '</h3>\n                      <span class="mini-product__price">'
                )
                .concat(
                  normalPrice(dataItem.price),
                  ' \u0440</span>\n                    </div>\n                    <button class="btn-reset mini-product__delete" aria-label="\u0423\u0434\u0430\u043B\u0438\u0442\u044C \u0442\u043E\u0432\u0430\u0440">\n                      \u0423\u0434\u0430\u043B\u0438\u0442\u044C\n                      <svg>\n                        <use xlink:href="img/sprite.svg#trash"></use>\n                      </svg>\n                    </button>\n                  </div>\n                </article>\n              </li>\n            '
                )
            );
            return dataItem;
          }
        }
      } catch (err) {
        _iterator2.e(err);
      } finally {
        _iterator2.f();
      }
    })
    .then(function (item) {
      plusFullPrice(item.price);
      printFullPrice();
      var num = document.querySelectorAll(
        ".mini-cart__list .mini-cart__item"
      ).length;

      if (num > 0) {
        cartCount.classList.add("cart__count--visible");
      }

      printQuantity(num);

      if (cartCount) {
        cartCount.classList.remove("bump");
        void cartCount.offsetWidth;
        cartCount.classList.add("bump");
      }
      if (item && item.title) {
        showToast("Добавлено: " + item.title);
      }
    });
};

function cartLogic() {
  var productBtn = document.querySelectorAll(".add-to-cart-btn");
  productBtn.forEach(function (el) {
    el.addEventListener("click", function (e) {
      var id = e.currentTarget.dataset.id;
      loadCartData(id);
      document
        .querySelector(".cart__btn")
        .classList.remove("cart__btn--inactive");
      e.currentTarget.classList.add("product__btn--disabled");
    });
  });
  if (miniCartList) {
    miniCartList.addEventListener("click", function (e) {
    if (e.target.classList.contains("mini-product__delete")) {
      var self = e.target;
      var parent = self.closest(".mini-cart__item");

      var _price = parseInt(
        priceWithoutSpaces(
          parent.querySelector(".mini-product__price").textContent
        )
      );

      var id = parent.dataset.id;
      console.log(
        document.querySelector('.product__btn[data-id="'.concat(id, '"]'))
      );
      document
        .querySelector('.add-to-cart-btn[data-id="'.concat(id, '"]'))
        .classList.remove("product__btn--disabled");
      parent.remove();
      minusFullPrice(_price);
      printFullPrice();
      var num = document.querySelectorAll(
        ".mini-cart__list .mini-cart__item"
      ).length;

      if (num == 0) {
        cartCount.classList.remove("cart__count--visible");
        miniCart.classList.remove("mini-cart--visible");
        document
          .querySelector(".cart__btn")
          .classList.add("cart__btn--inactive");
      }

      printQuantity(num);
    }
  });
  }
};

var openOrderModal = document.querySelector(".mini-cart__btn");
var orderModalList = document.querySelector(".cart-modal-order__list");
var orderModalQuantity = document.querySelector(".cart-modal-order__quantity span");
var orderModalSumm = document.querySelector(".cart-modal-order__summ span");
var orderModalShow = document.querySelector(".cart-modal-order__show");

if (openOrderModal && orderModalList && orderModalQuantity && orderModalSumm) {
  openOrderModal.addEventListener("click", function () {
    var miniList = document.querySelector(".mini-cart__list");
    var productsHtml = miniList ? miniList.innerHTML : "";
    orderModalList.innerHTML = productsHtml;
    orderModalQuantity.textContent = "".concat(
      document.querySelectorAll(".mini-cart__list .mini-cart__item").length,
      " шт"
    );
    if (fullPrice) orderModalSumm.textContent = fullPrice.textContent;
  });
}

if (orderModalShow && orderModalList) {
  orderModalShow.addEventListener("click", function () {
    if (orderModalList.classList.contains("cart-modal-order__list--visible")) {
      orderModalList.classList.remove("cart-modal-order__list--visible");
      orderModalShow.classList.remove("cart-modal-order__show--active");
    } else {
      orderModalList.classList.add("cart-modal-order__list--visible");
      orderModalShow.classList.add("cart-modal-order__show--active");
    }
  });
}

if (orderModalList) {
  orderModalList.addEventListener("click", function (e) {
    if (e.target.classList.contains("mini-product__delete")) {
      var self = e.target;
      var parent = self.closest(".mini-cart__item");
      if (!parent) return;

      var priceEl = parent.querySelector(".mini-product__price");
      var _price2 = priceEl ? parseInt(priceWithoutSpaces(priceEl.textContent), 10) : 0;
      var id = parent.dataset.id;

      var addBtn = document.querySelector('.add-to-cart-btn[data-id="' + id + '"]');
      if (addBtn) addBtn.classList.remove("product__btn--disabled");

      parent.remove();

      var deleteFromCart = document.querySelector('.mini-cart__item[data-id="' + id + '"]');
      if (deleteFromCart) deleteFromCart.remove();

      minusFullPrice(_price2);
      printFullPrice();

      setTimeout(function () {
        var num = document.querySelectorAll(".cart-modal-order__list .mini-cart__item").length;
        if (num === 0) {
          if (cartCount) cartCount.classList.remove("cart__count--visible");
          if (miniCart) miniCart.classList.remove("mini-cart--visible");
          var cartBtnEl = document.querySelector(".cart__btn");
          if (cartBtnEl) cartBtnEl.classList.add("cart__btn--inactive");
          if (typeof modal !== 'undefined' && modal) modal.close();
        }
        printQuantity(num);
      }, 100);
    }
  });
}

var quizThemeUri = (typeof sneakmaxData !== "undefined" && sneakmaxData.themeUri) ? sneakmaxData.themeUri : "";
var quizFormData = null;
var textareaText = null;
var quizData = [
  {
    number: 1,
    title: "Какой тип кроссовок рассматриваете?",
    answer_alias: "type",
    answers: [
      {
        answer_title: "Городские повседневные",
        type: "checkbox",
        img: "img/quiz-lifestyle.webp",
      },
      {
        answer_title: "Беговые и тренировочные",
        type: "checkbox",
        img: "img/quiz-running.webp",
      },
      {
        answer_title: "Высокие баскетбольные",
        type: "checkbox",
        img: "img/quiz-basketball.webp",
      },
      {
        answer_title: "Скейтбординг и кеды",
        type: "checkbox",
        img: "img/quiz-skate.webp",
      },
      {
        answer_title: "Трейл и непогода",
        type: "checkbox",
        img: "img/quiz-trail.webp",
      },
      {
        answer_title: "Ретро-классика",
        type: "checkbox",
        img: "img/quiz-retro.webp",
      },
    ],
  },
  {
    number: 2,
    title: "Какой размер вам подойдет?",
    answer_alias: "size",
    answers: [
      {
        answer_title: "35 — 37",
        type: "checkbox",
      },
      {
        answer_title: "38 — 40",
        type: "checkbox",
      },
      {
        answer_title: "41 — 42",
        type: "checkbox",
      },
      {
        answer_title: "43 — 44",
        type: "checkbox",
      },
      {
        answer_title: "45 и больше",
        type: "checkbox",
      },
    ],
  },
  {
    number: 3,
    title: "Уточните какие-либо моменты",
    answer_alias: "message",
    answers: [
      {
        answer_title: "Укажите любимые бренды, цвета или бюджет...",
        type: "textarea",
      },
    ],
  },
];

var quizTemplate = function quizTemplate() {
  var data =
    arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];
  var dataLength =
    arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;
  var options = arguments.length > 2 ? arguments[2] : undefined;
  var number = data.number,
    title = data.title;
  var nextBtnText = options.nextBtnText;
  var answers = data.answers.map(function (item) {
    if (item.type === "checkbox") {
      var quizThemeUri = (typeof sneakmaxData !== "undefined" && sneakmaxData.themeUri) ? sneakmaxData.themeUri : "";
      var quizImg = item.img || "";
      if (quizImg && quizThemeUri && quizImg.indexOf("http") !== 0 && quizImg.indexOf("/") !== 0) {
        quizImg = quizThemeUri + "/" + quizImg.replace(/^\.\//, "");
      }
      var imgHtml = quizImg
        ? '\n          <img src="'
            .concat(quizImg, '" alt="" aria-hidden="true" width="280" height="220" loading="lazy">')
        : "";
      return '\n        <li class="quiz-question__item'
        .concat(item.img ? "" : " quiz-question__item--no-img", '">')
        .concat(imgHtml, '\n          <label class="custom-checkbox quiz-question__label">\n            <input type="')
        .concat(
          item.type,
          '" class="custom-checkbox__field quiz-question__answer" data-valid="false" name="'
        )
        .concat(data.answer_alias, '" ')
        .concat(
          item.type == "text" ? 'placeholder="Введите ваш вариант"' : "",
          ' value="'
        )
        .concat(
          item.type !== "text" ? item.answer_title : "",
          '">\n            <span class="custom-checkbox__content">'
        )
        .concat(
          item.answer_title,
          "</span>\n          </label>\n        </li>\n      "
        );
    } else if (item.type === "textarea") {
      return '\n        <label class="quiz-question__label">\n          <textarea placeholder="'.concat(
        item.answer_title,
        '" class="quiz-question__message"></textarea>\n        </label>\n      '
      );
    } else {
      return '\n        <label class="quiz-question__label">\n          <input type="'
        .concat(
          item.type,
          '" data-valid="false" class="quiz-question__answer" name="'
        )
        .concat(data.answer_alias, '" ')
        .concat(
          item.type == "text" ? 'placeholder="Введите ваш вариант"' : "",
          ' value="'
        )
        .concat(
          item.type !== "text" ? item.answer_title : "",
          '">\n          <span>'
        )
        .concat(item.answer_title, "</span>\n        </label>\n      ");
    }
  });
  return '\n    <div class="quiz-question">\n      <h3 class="quiz-question__title">'
    .concat(
      title,
      '</h3>\n      <ul class="quiz-question__answers list-reset">\n        '
    )
    .concat(
      answers.join(""),
      '\n      </ul>\n      <div class="quiz-bottom">\n        <div class="quiz-question__count">'
    )
    .concat(number, " \u0438\u0437 ")
    .concat(
      dataLength,
      '</div>\n        <button type="button" class="btn btn-reset btn--thirdly quiz-question__btn" data-next-btn>'
    )
    .concat(nextBtnText, "</button>\n      </div>\n    </div>\n\t");
};

var Quiz = /*#__PURE__*/ (function () {
  function Quiz(selector, data, options) {
    _classCallCheck(this, Quiz);

    this.$el = document.querySelector(selector);
    this.options = options;
    this.data = data;
    this.counter = 0;
    this.dataLength = this.data.length;
    this.resultArray = [];
    this.tmp = {};
    this.init();
    this.events();
  }

  _createClass(Quiz, [
    {
      key: "init",
      value: function init() {
        console.log("init!");
        this.$el.innerHTML = quizTemplate(
          this.data[this.counter],
          this.dataLength,
          this.options
        );
      },
    },
    {
      key: "nextQuestion",
      value: function nextQuestion() {
        var _this = this;

        if (this.counter + 1 < this.dataLength) {
          this.counter++;
          this.$el.innerHTML = quizTemplate(
            this.data[this.counter],
            this.dataLength,
            this.options
          );

          if (this.counter + 1 == this.dataLength) {
            var answersEl = document.querySelector(".quiz-question__answers");
            if (answersEl) {
              answersEl.style.display = "block";
            }
          }

          var quizSection = document.getElementById("quiz");
          if (quizSection) {
            quizSection.scrollIntoView({ behavior: "smooth", block: "nearest" });
          }
        } else {
          var questionsEl = document.querySelector(".quiz-questions");
          if (questionsEl) {
            questionsEl.style.display = "none";
          }
          var lastQ = document.querySelector(".last-question");
          if (lastQ) {
            lastQ.style.display = "block";
          }
          var quizTitle = document.querySelector(".quiz__title");
          if (quizTitle) {
            quizTitle.textContent = "Ваша подборка готова!";
          }
          var quizDescr = document.querySelector(".quiz__descr");
          if (quizDescr) {
            quizDescr.textContent = "Оставьте свои контактные данные, чтобы мы могли отправить подготовленный для вас каталог";
          }

          var quizForm = document.querySelector(".quiz-form");
          if (quizForm) {
            var quizPhoneInput = quizForm.querySelector('input[name="phone"]');
            if (quizPhoneInput && typeof phoneMask !== "undefined" && phoneMask && typeof phoneMask.mask === "function") {
              phoneMask.mask(quizPhoneInput);
            }

            quizForm.onsubmit = function (e) {
              e.preventDefault();
              quizForm.reset();
              if (typeof showToast === "function") {
                showToast("Ваш запрос принят! Персональный каталог отправлен на указанную почту.");
              }
            };
          }
        }
      },
    },
    {
      key: "events",
      value: function events() {
        var _this2 = this;

        this.$el.addEventListener("click", function (e) {
          // Toggle checkbox/radio when clicking anywhere on item card (e.g. image)
          var item = e.target.closest(".quiz-question__item");
          if (item && !e.target.closest("label") && !e.target.closest("input") && !e.target.closest("button") && !e.target.closest("[data-next-btn]")) {
            var inp = item.querySelector("input");
            if (inp) {
              inp.checked = !inp.checked;
              inp.dispatchEvent(new Event("change", { bubbles: true }));
            }
          }

          var nextBtn = e.target.closest("[data-next-btn]");
          if (nextBtn) {
            e.preventDefault();
            if (!_this2.valid()) {
              if (typeof showToast === "function") {
                showToast("Пожалуйста, выберите хотя бы один вариант ответа");
              }
              var items = _this2.$el.querySelectorAll(".quiz-question__item, .quiz-question__label");
              items.forEach(function (el) {
                el.classList.add("quiz-error-shake");
                setTimeout(function () {
                  el.classList.remove("quiz-error-shake");
                }, 600);
              });
              return;
            }

            _this2.addToSend();
            _this2.nextQuestion();
          }
        });

        this.$el.addEventListener("change", function (e) {
          if (e.target.tagName == "INPUT") {
            if (e.target.type !== "checkbox" && e.target.type !== "radio") {
              var elements = _this2.$el.querySelectorAll("input");
              elements.forEach(function (el) {
                el.checked = false;
              });
            }

            var quizForm = document.querySelector(".quiz-form");
            if (quizForm) {
              _this2.tmp = _this2.serialize(quizForm);
            }
          } else {
            var textarea = _this2.$el.querySelector("textarea");
            if (textarea) {
              textareaText = textarea.value;
            }
          }
        });
      },
    },
    {
      key: "valid",
      value: function valid() {
        var textarea = this.$el.querySelector("textarea");
        if (textarea) {
          return true;
        }

        var elements = this.$el.querySelectorAll("input");
        if (elements.length === 0) {
          return true;
        }

        var hasChecked = false;
        elements.forEach(function (el) {
          if (el.type === "checkbox" || el.type === "radio") {
            if (el.checked) {
              hasChecked = true;
            }
          } else if (el.type === "text") {
            if (el.value.trim().length > 0) {
              hasChecked = true;
            }
          }
        });

        return hasChecked;
      },
    },
    {
      key: "addToSend",
      value: function addToSend() {
        var quizForm = document.querySelector(".quiz-form");
        if (quizForm) {
          this.tmp = this.serialize(quizForm);
        }
        this.resultArray.push(this.tmp);
      },
    },
    {
      key: "serialize",
      value: function serialize(form) {
        var field,
          s = {};
        var valueString = "";

        if (_typeof(form) == "object" && form.nodeName == "FORM") {
          var len = form.elements.length;

          for (var i = 0; i < len; i++) {
            field = form.elements[i];

            if (
              field.name &&
              !field.disabled &&
              field.type != "file" &&
              field.type != "reset" &&
              field.type != "submit" &&
              field.type != "button"
            ) {
              if (field.type == "select-multiple") {
                for (j = form.elements[i].options.length - 1; j >= 0; j--) {
                  if (field.options[j].selected)
                    s[s.length] =
                      encodeURIComponent(field.name) +
                      "=" +
                      encodeURIComponent(field.options[j].value);
                }
              } else if (
                (field.type != "checkbox" &&
                  field.type != "radio" &&
                  field.value) ||
                field.checked
              ) {
                valueString += field.value + ",";
                s[field.name] = valueString;
              }
            }
          }
        }

        return s;
      },
    },
  ]);

  return Quiz;
})();

window.quiz = new Quiz(".quiz-form .quiz-questions", quizData, {
  nextBtnText: "Следующий шаг",
  sendBtnText: "Отправить",
});
("use strict");

var rangeSlider = document.getElementById("range-slider");

if (rangeSlider) {
  noUiSlider.create(rangeSlider, {
    start: [500, 999999],
    connect: true,
    step: 1,
    range: {
      min: [500],
      max: [999999],
    },
  });
  var input0 = document.getElementById("input-0");
  var input1 = document.getElementById("input-1");
  var inputs = [input0, input1];
  rangeSlider.noUiSlider.on("update", function (values, handle) {
    inputs[handle].value = Math.round(values[handle]);
  });

  var setRangeSlider = function setRangeSlider(i, value) {
    var arr = [null, null];
    arr[i] = value;
    rangeSlider.noUiSlider.set(arr);
  };

  inputs.forEach(function (el, index) {
    el.addEventListener("change", function (e) {
      setRangeSlider(index, e.currentTarget.value);
    });
  });

  // Выбор размеров в фильтре каталога
  var sizeCells = document.querySelectorAll(".sizes-table td");
  sizeCells.forEach(function (td) {
    td.setAttribute("role", "button");
    td.setAttribute("tabindex", "0");
    td.setAttribute("aria-label", "Размер " + td.textContent.trim());
    td.setAttribute("aria-pressed", "false");
    td.addEventListener("click", function () {
      var isAct = td.classList.toggle("active");
      td.setAttribute("aria-pressed", isAct ? "true" : "false");
    });
    td.addEventListener("keydown", function (e) {
      if (e.key === "Enter" || e.key === " ") {
        e.preventDefault();
        var isAct = td.classList.toggle("active");
        td.setAttribute("aria-pressed", isAct ? "true" : "false");
      }
    });
  });

  var catalogResetBtn = document.querySelector(".catalog__reset");
  if (catalogResetBtn) {
    catalogResetBtn.addEventListener("click", function () {
      rangeSlider.noUiSlider.set([500, 999999]);
      document
        .querySelectorAll(".catalog__prop-checkboxes input")
        .forEach(function (cb) {
          cb.checked = false;
        });
      sizeCells.forEach(function (td) {
        td.classList.remove("active");
        td.setAttribute("aria-pressed", "false");
      });
      activeFilter.minPrice = 0;
      activeFilter.maxPrice = Infinity;
      activeFilter.genders = [];
      activeFilter.sizes = [];
      prodQuantity = 6;
      loadProducts(prodQuantity);
      showToast("Фильтры сброшены");
    });
  }

  var catalogApplyBtn = document.querySelector(".catalog__apply");
  if (catalogApplyBtn) {
    catalogApplyBtn.addEventListener("click", function () {
      var sliderValues = rangeSlider.noUiSlider.get();
      activeFilter.minPrice = parseInt(sliderValues[0], 10) || 0;
      activeFilter.maxPrice = parseInt(sliderValues[1], 10) || Infinity;

      var selectedGenders = [];
      document
        .querySelectorAll(".catalog__prop-checkboxes input:checked")
        .forEach(function (cb) {
          selectedGenders.push(cb.value);
        });
      activeFilter.genders = selectedGenders;

      var selectedSizes = [];
      document.querySelectorAll(".sizes-table td.active").forEach(function (td) {
        var sz = parseFloat(td.textContent.trim());
        if (!isNaN(sz)) selectedSizes.push(sz);
      });
      activeFilter.sizes = selectedSizes;

      prodQuantity = 6;
      loadProducts(prodQuantity);
      showToast("Фильтры применены");

      if (window.innerWidth <= 1024 && filtersToggle && filtersBody) {
        filtersToggle.classList.remove("catalog-filters__toggle--active");
        filtersToggle.setAttribute("aria-expanded", "false");
        filtersBody.classList.remove("catalog-filters__body--open");
      }
    });
  }

  var filtersToggle = document.querySelector(".catalog-filters__toggle");
  var filtersBody = document.querySelector(".catalog-filters__body");
  if (filtersToggle && filtersBody) {
    filtersToggle.addEventListener("click", function () {
      var isOpen = filtersToggle.classList.toggle("catalog-filters__toggle--active");
      filtersToggle.setAttribute("aria-expanded", isOpen ? "true" : "false");
      filtersBody.classList.toggle("catalog-filters__body--open", isOpen);
    });
  }
}
("use strict");

var styles = getComputedStyle(document.documentElement);
var colorValue = styles.getPropertyValue("--color-accent");
var telInputs = document.querySelectorAll('input[type="tel"]');
var phoneMask = new Inputmask("+7 (999) 999-9999");
telInputs.forEach(function (inp) {
  phoneMask.mask(inp);
});
var productsFormData = null;

var validateForms = function validateForms(
  selector,
  rules,
  messages,
  successModal,
  yaGoal
) {
  new window.JustValidate(selector, {
    rules: rules,
    messages: messages,
    colorWrong: colorValue,
    submitHandler: function submitHandler(form) {
      console.log(form);

      if (form.classList.contains("cart-modal__form")) {
        productsFormData = new FormData(
          document.querySelector(".cart-modal__form")
        );
        document
          .querySelectorAll(".cart-modal-order__list .mini-cart__item")
          .forEach(function (el, idx) {
            var title = el.querySelector(".mini-product__title").textContent;
            var price = el.querySelector(".mini-product__price").textContent;
            productsFormData.append(
              "product-".concat(idx + 1),
              "".concat(title, ", ").concat(price)
            );
          });
        productsFormData.append(
          "summ",
          "".concat(
            document.querySelector(".cart-modal-order__summ span").textContent
          )
        );
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4) {
            if (xhr.status === 200) {
              console.log("Отправлено");
            }
          }
        };

        xhr.open("POST", "mail.php", true);
        xhr.send(productsFormData);
        form.reset();
        showToast("Спасибо за заказ! Наш менеджер свяжется с вами.");
        if (miniCartList) miniCartList.innerHTML = "";
        price = 0;
        printFullPrice();
        printQuantity(0);
        if (cartCount) cartCount.classList.remove("cart__count--visible");
        if (miniCart) miniCart.classList.remove("mini-cart--visible");
        var cBtn = document.querySelector(".cart__btn");
        if (cBtn) cBtn.classList.add("cart__btn--inactive");
        document.querySelectorAll(".add-to-cart-btn").forEach(function (btn) {
          btn.classList.remove("product__btn--disabled");
        });
        if (modal) modal.close();
      } else {
        var formData = new FormData(form);

        var _xhr = new XMLHttpRequest();

        _xhr.onreadystatechange = function () {
          if (_xhr.readyState === 4) {
            if (_xhr.status === 200) {
              console.log("Отправлено");
            }
          }
        };

        _xhr.open("POST", "mail.php", true);

        _xhr.send(formData);

        form.reset();
        showToast("Спасибо за заявку! Мы свяжемся с вами в ближайшее время.");
      }
    },
  });
};

validateForms(
  ".callback-form",
  {
    name: {
      required: true,
    },
    phone: {
      required: true,
    },
  },
  {
    name: {
      required: "Вы должны ввести имя",
    },
    phone: {
      required: "Вы должны ввести телефон",
    },
  },
  ".thanks-popup"
);
validateForms(
  ".cart-modal__form",
  {
    name: {
      required: true,
    },
    phone: {
      required: true,
    },
    email: {
      required: true,
      email: true,
    },
  },
  {
    name: {
      required: "Вы должны ввести имя",
    },
    phone: {
      required: "Вы должны ввести телефон",
    },
    email: {
      required: "Вы должны ввести email",
      email: "Вы должны ввести корректный email",
    },
  },
  ".thanks-popup"
);
/**
 * название функции
 *
 * @param {number} first - первое число
 * @returns {number}
 */
("use strict");
// Hero banner sneakers rotation
(function () {
  var heroSlides = document.querySelectorAll(".hero__slide");
  if (!heroSlides || heroSlides.length < 2) return;
  var currentHeroIndex = 0;
  setInterval(function () {
    heroSlides[currentHeroIndex].classList.remove("hero__slide--active");
    currentHeroIndex = (currentHeroIndex + 1) % heroSlides.length;
    heroSlides[currentHeroIndex].classList.add("hero__slide--active");
  }, 4000);
})();
//# sourceMappingURL=main.js.map
