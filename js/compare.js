// My code 

window.addEventListener('load', () => {
	function addHandlerButtonClose() {
		const buttonsClose = document.querySelectorAll('.button-close')
		buttonsClose.forEach(element => {
			element.addEventListener('click', compareHandler);
		});
	}

	const button = document.querySelectorAll('#send-request');

	button.forEach(element => {
		element.addEventListener('click', compareHandler);
	});
	addHandlerButtonClose();
	
	



	function compareHandler() {
		console.log(this);
		event.preventDefault();
		const {
			idProduct, 
			typeRequest = 'add', 
			requestHtml = false, 
			targetSection = '.section-compare'
		} = this.dataset;

		const data = new URLSearchParams({
			action: 'compare',
			security: ajaxData.nonce,
			idProduct,
			typeRequest,
			requestHtml
		})

		fetch(ajaxData.ajaxUrl, {
			method: 'POST',
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded',
			},
			body: data.toString(),
		})
		.then(response => response.json())
		.then(answer => {
			if(requestHtml) {
				const targetElement = document.querySelector(targetSection);
				targetElement.innerHTML = answer.data.html;
				addHandlerButtonClose();
			}

			console.log(data)
		})
		.catch(err => {
			alert(err.message)
			console.error(err.message)
		})
	}
	
})

