var StarRating=function(){"use strict";function e(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function t(e,t){for(var i=0;i<t.length;i++){var s=t[i];s.enumerable=s.enumerable||!1,s.configurable=!0,"value"in s&&(s.writable=!0),Object.defineProperty(e,s.key,s)}}function i(e,i,s){return i&&t(e.prototype,i),s&&t(e,s),e}var s={classNames:{active:"gl-active",base:"gl-star-rating",selected:"gl-selected"},clearable:!0,maxStars:10,prebuilt:!1,stars:null,tooltip:"Select a Rating"},n=function(e,t,i){e.classList[t?"add":"remove"](i)},a=function(e){var t=document.createElement("span");for(var i in e=e||{})t.setAttribute(i,e[i]);return t},l=function(e,t,i){var s=a(i);return e.parentNode.insertBefore(s,t?e.nextSibling:e),s},r=function e(){for(var t=arguments.length,i=new Array(t),s=0;s<t;s++)i[s]=arguments[s];var n={};return i.forEach((function(t){Object.keys(t||{}).forEach((function(s){if(void 0!==i[0][s]){var a=t[s];"Object"!==o(a)||"Object"!==o(n[s])?n[s]=a:n[s]=e(n[s],a)}}))})),n},o=function(e){return{}.toString.call(e).slice(8,-1)},u=function(){function t(i,s){var n,a,l;e(this,t),this.direction=window.getComputedStyle(i,null).getPropertyValue("direction"),this.el=i,this.events={change:this.onChange.bind(this),keydown:this.onKeyDown.bind(this),mousedown:this.onPointerDown.bind(this),mouseleave:this.onPointerLeave.bind(this),mousemove:this.onPointerMove.bind(this),reset:this.onReset.bind(this),touchend:this.onPointerDown.bind(this),touchmove:this.onPointerMove.bind(this)},this.indexActive=null,this.indexSelected=null,this.props=s,this.tick=null,this.ticking=!1,this.values=function(e){var t=[];return[].forEach.call(e.options,(function(e){var i=parseInt(e.value,10)||0;i>0&&t.push({index:e.index,text:e.text,value:i})})),t.sort((function(e,t){return e.value-t.value}))}(i),this.widgetEl=null,this.el.widget&&this.el.widget.destroy(),n=this.values.length,a=1,l=this.props.maxStars,/^\d+$/.test(n)&&a<=n&&n<=l?this.build():this.destroy()}return i(t,[{key:"build",value:function(){this.destroy(),this.buildWidget(),this.selectValue(this.indexSelected=this.selected(),!1),this.handleEvents("add"),this.el.widget=this}},{key:"buildWidget",value:function(){var e=this,t=null,i=null;this.props.prebuilt&&(t=this.el.parentNode,i=t.querySelector("."+this.props.classNames.base+"--stars")),null===i&&((t=l(this.el,!1,{class:this.props.classNames.base})).appendChild(this.el),i=l(this.el,!0,{class:this.props.classNames.base+"--stars"}),this.values.forEach((function(t,s){var n=a({"data-index":s,"data-value":t.value});"function"==typeof e.props.stars&&e.props.stars.call(e,n,t,s),[].forEach.call(n.children,(function(e){return e.style.pointerEvents="none"})),i.innerHTML+=n.outerHTML}))),t.dataset.starRating="",t.classList.add(this.props.classNames.base+"--"+this.direction),this.props.tooltip&&i.setAttribute("role","tooltip"),this.widgetEl=i}},{key:"changeIndexTo",value:function(e,t){var i=this;if(this.indexActive!==e||t){if([].forEach.call(this.widgetEl.children,(function(t,s){n(t,s<=e,i.props.classNames.active),n(t,s===i.indexSelected,i.props.classNames.selected)})),this.widgetEl.setAttribute("data-rating",e+1),"function"==typeof this.props.stars||this.props.prebuilt||(this.widgetEl.classList.remove("s"+10*(this.indexActive+1)),this.widgetEl.classList.add("s"+10*(e+1))),this.props.tooltip){var s,a=e<0?this.props.tooltip:null===(s=this.values[e])||void 0===s?void 0:s.text;this.widgetEl.setAttribute("aria-label",a)}this.indexActive=e}this.ticking=!1}},{key:"destroy",value:function(){this.indexActive=null,this.indexSelected=this.selected();var e=this.el.parentNode;e.classList.contains(this.props.classNames.base)&&(this.props.prebuilt?(this.widgetEl=e.querySelector("."+this.props.classNames.base+"--stars"),e.classList.remove(this.props.classNames.base+"--"+this.direction),delete e.dataset.starRating):e.parentNode.replaceChild(this.el,e),this.handleEvents("remove")),delete this.el.widget}},{key:"eventListener",value:function(e,t,i,s){var n=this;i.forEach((function(i){return e[t+"EventListener"](i,n.events[i],s||!1)}))}},{key:"handleEvents",value:function(e){var t=this.el.closest("form");t&&"FORM"===t.tagName&&this.eventListener(t,e,["reset"]),this.eventListener(this.el,e,["change"]),"add"===e&&this.el.disabled||(this.eventListener(this.el,e,["keydown"]),this.eventListener(this.widgetEl,e,["mousedown","mouseleave","mousemove","touchend","touchmove"],!1))}},{key:"indexFromEvent",value:function(e){var t,i,s=(null===(t=e.touches)||void 0===t?void 0:t[0])||(null===(i=e.changedTouches)||void 0===i?void 0:i[0])||e,n=document.elementFromPoint(s.clientX,s.clientY);return n.parentNode===this.widgetEl?[].slice.call(n.parentNode.children).indexOf(n):this.indexActive}},{key:"onChange",value:function(){this.changeIndexTo(this.selected(),!0)}},{key:"onKeyDown",value:function(e){var t=e.key.slice(5);if(~["Left","Right"].indexOf(t)){e.preventDefault();var i="Left"===t?-1:1;"rtl"===this.direction&&(i*=-1);var s=this.values.length-1,n=Math.min(Math.max(this.selected()+i,-1),s);this.selectValue(n,!0)}}},{key:"onPointerDown",value:function(e){e.preventDefault();var t=this.indexFromEvent(e);this.props.clearable&&t===this.indexSelected&&(t=-1),this.selectValue(t,!0)}},{key:"onPointerLeave",value:function(e){var t=this;e.preventDefault(),cancelAnimationFrame(this.tick),requestAnimationFrame((function(){return t.changeIndexTo(t.indexSelected)}))}},{key:"onPointerMove",value:function(e){var t=this;e.preventDefault(),this.ticking||(this.tick=requestAnimationFrame((function(){return t.changeIndexTo(t.indexFromEvent(e))})),this.ticking=!0)}},{key:"onReset",value:function(){var e,t=this.valueIndex(null===(e=this.el.querySelector("[selected]"))||void 0===e?void 0:e.value);this.selectValue(t||-1,!1)}},{key:"selected",value:function(){return this.valueIndex(this.el.value)}},{key:"selectValue",value:function(e,t){var i;this.el.value=(null===(i=this.values[e])||void 0===i?void 0:i.value)||"",this.indexSelected=this.selected(),!1===t?this.changeIndexTo(this.selected(),!0):this.el.dispatchEvent(new Event("change"))}},{key:"valueIndex",value:function(e){return this.values.findIndex((function(t){return t.value===+e}))}}]),t}();return function(){function t(i,s){e(this,t),this.destroy=this.destroy.bind(this),this.props=s,this.rebuild=this.rebuild.bind(this),this.selector=i,this.widgets=[],this.build()}return i(t,[{key:"build",value:function(){var e=this;this.queryElements(this.selector).forEach((function(t){var i=r(s,e.props,JSON.parse(t.getAttribute("data-options")));"SELECT"!==t.tagName||t.widget||(!i.prebuilt&&t.parentNode.classList.contains(i.classNames.base)&&e.unwrap(t),e.widgets.push(new u(t,i)))}))}},{key:"destroy",value:function(){this.widgets.forEach((function(e){return e.destroy()})),this.widgets=[]}},{key:"queryElements",value:function(e){return"HTMLSelectElement"===o(e)?[e]:"NodeList"===o(e)?[].slice.call(e):"String"===o(e)?[].slice.call(document.querySelectorAll(e)):[]}},{key:"rebuild",value:function(){this.destroy(),this.build()}},{key:"unwrap",value:function(e){var t=e.parentNode,i=t.parentNode;i.insertBefore(e,t),i.removeChild(t)}}]),t}()}();


// My code 


window.addEventListener('load', () => {
  // Функция для добавления обработчиков кнопок "Закрыть"
  function addHandlerButtonClose() {
      const buttonsClose = document.querySelectorAll('.button-close');
      buttonsClose.forEach(element => {
          element.addEventListener('click', compareHandler);
      });
  }

  // Обработчик для кнопок .compare-btn-products (много)
  const compareBtnProducts = document.querySelectorAll('.compare-btn-products');
  compareBtnProducts.forEach(button => {
      button.addEventListener('click', compareHandler);
  });

  // Обработчики для кнопок с добавлением/удалением товаров
  const buttons = document.querySelectorAll('#send-request');
  buttons.forEach(element => {
      element.addEventListener('click', compareHandler);
  });
  
  addHandlerButtonClose();

  // Обработчик для кнопок .product-info-compare
  // const compareProductButtons = document.querySelectorAll('.product-info-compare');
  // compareProductButtons.forEach(button => {
  //     button.addEventListener('click', handleCompareProductClick);
  // });

  // Функция для сохранения ID продукта в localStorage
  function saveToLocalStorage(idProduct) {
      const products = getFromLocalStorage();
      if (!products.includes(idProduct)) {
          products.push(idProduct);
          localStorage.setItem('compareProducts', JSON.stringify(products));
      }
  }

  // Функция для удаления ID продукта из localStorage
  function removeFromLocalStorage(idProduct) {
      let products = getFromLocalStorage();
      products = products.filter(productId => productId !== idProduct);
      localStorage.setItem('compareProducts', JSON.stringify(products));
  }

  // Функция для получения всех продуктов из localStorage
  function getFromLocalStorage() {
      const storedData = localStorage.getItem('compareProducts');
      return storedData ? JSON.parse(storedData) : [];
  }

  // Функция для восстановления текста кнопок на "Added to List"
  function restoreButtonTexts() {
      const products = getFromLocalStorage();
      if (!products.length) return;

      products.forEach(idProduct => {
          const buttons = document.querySelectorAll(`#send-request[data-id-product="${idProduct}"]`);
          if (buttons.length) {
              buttons.forEach(button => {
                  if (!button.dataset.originalText) {
                      button.dataset.originalText = button.textContent; // Сохраняем оригинальный текст
                  }
                  button.textContent = 'Added to List'; // Устанавливаем новый текст
              });
          }
      });
  }

  // Функция для обновления кнопки сравнения (показывать/скрывать)
  function updateCompareHeaderButton() {
      const compareHeaderButton = document.querySelector('.compare-header-button');
      const countElement = compareHeaderButton.querySelector('.count');
      const products = getFromLocalStorage();

      if (products.length > 0) {
          compareHeaderButton.removeAttribute('hidden'); // Показываем кнопку
          countElement.textContent = products.length; // Обновляем количество товаров
      } else {
          compareHeaderButton.setAttribute('hidden', 'true'); // Скрываем кнопку
      }
  }

  // Основной обработчик для добавления и удаления товаров в/из сравнение
  function compareHandler(event) {
    const { 
        idProduct, 
        typeRequest = 'add', 
        requestHtml = false, 
        targetSection = '.section-compare', 
        redirect = false 
    } = this.dataset;

      const data = new URLSearchParams({
          action: 'compare',
          security: ajaxData.nonce,
          idProduct,
          typeRequest,
          requestHtml
      });

      fetch(ajaxData.ajaxUrl, {
          method: 'POST',
          headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: data.toString(),
      })
      .then(response => response.json())
      .then(answer => {
          if (typeRequest === 'remove') {
              restoreOriginalText(idProduct);
              removeFromLocalStorage(idProduct);
              updateCompareHeaderButton();
          } else {
              updateButtonsText(idProduct);
              saveToLocalStorage(idProduct);
              updateCompareHeaderButton();
          }

          if (requestHtml && requestHtml !== 'false') {
              const targetElement = document.querySelector(targetSection);
              targetElement.innerHTML = answer.data.html;
              targetElement.scrollIntoView({
                  behavior: 'smooth',
                  block: 'start'
              });
              addHandlerButtonClose();
          }

          if(redirect) {
            window.location.href = redirect;
          }

      })
      .catch(err => {
          console.error(err);
      });
  }

  // Функция для обновления текста кнопок на "Added to List"
  function updateButtonsText(idProduct) {
      const buttons = document.querySelectorAll(`#send-request[data-id-product="${idProduct}"]`);
      buttons.forEach(button => {
          if (!button.dataset.originalText) {
              button.dataset.originalText = button.textContent; // Сохраняем оригинальный текст
          }
          button.textContent = 'Added to List'; // Устанавливаем новый текст
      });
  }

  // Функция для восстановления исходного текста кнопок
  function restoreOriginalText(idProduct) {
      const buttons = document.querySelectorAll(`#send-request[data-id-product="${idProduct}"]`);
      buttons.forEach(button => {
          if (button.dataset.originalText) {
              button.textContent = button.dataset.originalText; // Восстанавливаем оригинальный текст
          }
      });
  }



  // Обработчик для кнопок .product-info-compare
//   function handleCompareProductClick(event) {
//     const idProduct = this.dataset.idProduct;
//     const products = getFromLocalStorage();

//     // Если товар уже добавлен в сравнение, обновляем секцию через существующий compareHandler
//     if (products.includes(idProduct)) {
//         // Используем compareHandler для обновления секции
//         const compareHandlerData = {
//             idProduct,
//             typeRequest: 'view',
//             requestHtml: true,
//             targetSection: '.section-compare'
//         };

//         compareHandler.call({ dataset: compareHandlerData });

//         // Редирект после завершения обновления секции
//         setTimeout(() => {
//             window.location.href = '/products/#section-compare';
//         }, 500); // Небольшая задержка для завершения скролла и обновления
//     } else {
//         // Если товара нет, добавляем его и обновляем UI
//         saveToLocalStorage(idProduct); // Добавляем товар в localStorage
//         updateButtonsText(idProduct);
//         updateCompareHeaderButton();

//         // Редирект после завершения всех операций
//         setTimeout(() => {
//             window.location.href = '/products/#section-compare';
//         }, 300);
//     }
// }



  // Восстановление текста кнопок и обновление кнопки сравнения при загрузке страницы
  restoreButtonTexts();
  updateCompareHeaderButton();
});

function setHandlerByButtons() {
	const reviewButtonPrev = document.querySelector('.reviews-pagination-btn--prev');
	const reviewButtonNext = document.querySelector('.reviews-pagination-btn--next');
	
	if(reviewButtonPrev) reviewButtonPrev.addEventListener('click', reviewsHandler);
	if(reviewButtonNext) reviewButtonNext.addEventListener('click', reviewsHandler);
}

setHandlerByButtons();

function reviewsHandler(event) {
	event.preventDefault();
	console.log('ok')

	const container = document.querySelector('#reviews-container');
	const id = container.dataset.postId;
	const page = this.dataset.page

	const data = new URLSearchParams({
		action: 'load_reviews',
		security: ajaxData.nonceReview,
		id,
		page
	})

	container.classList.add('load')
	fetch(ajaxData.ajaxUrl, {
		method: 'POST',
		headers: {
			'Content-Type': 'application/x-www-form-urlencoded',
		},
		body: data.toString(),
	})
	.then(response => response.json())

	.then(data => {
		const html = data.data.reviews;
		container.classList.remove('load')
		container.innerHTML = html;
		setHandlerByButtons()
	})
	.catch(err => {
		alert(err.message)
		console.error(err.message)
	})
}


const form = document.querySelector("#review-form");

form.addEventListener("submit", function (event) {
	event.preventDefault();

	// Собираем данные формы в объект
	const formData = {};
	const id = this.dataset.id;
	const inputs = this.querySelectorAll('input, textarea');
	const rating = document.querySelector('.gl-star-rating--stars').dataset.rating;
	console.log(rating)

	inputs.forEach(input => {
			if (input.type === 'checkbox') {
					formData[input.name] = input.checked;
			} else if (input.type === 'radio') {
					if (input.checked) {
							formData[input.name] = input.value;
					}
			} else {
					formData[input.name] = input.value;
			}
	});


	const data = new URLSearchParams({
		action: 'form_review',
		security: ajaxData.nonceReviewForm,
		id: id,
		rating,
		...formData
	})
	console.log(formData)

	fetch(ajaxData.ajaxUrl, {
		method: 'POST',
		headers: {
			'Content-Type': 'application/x-www-form-urlencoded',
		},
		body: data.toString(),
	})
	.then(response => response.json())
	.then(data => {
		if(data.success) {
			alert('Your review has been added')
		} else {
			alert(`Error: ${data.data}`)
		}
	})
});







