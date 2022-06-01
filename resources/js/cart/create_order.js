import { get_session } from '../db/get_session';
import { notification } from '../notification/swal';
import { sendData } from '../db/send';
import { redirect } from '../db/redirect';

document.addEventListener('DOMContentLoaded', () => {
  /*
  const expenses = {
    header: 'application/x-www-form-urlencoded',
  }; */

  let status;

  function get_session_id() {
    const send_session = get_session('get_auth');
    send_session()
      .then(response => {
        if (response.length === 0) {
          notification('Вы не авторизованы', 'error');
          status = 0;
        }
      })
      .catch(error => console.error(error));
  }

  document.querySelector('#order').addEventListener('click', function (e) {
    get_session_id();

    if (status != undefined) {
      return false;
    }

    const path = 'basket/getOrder';

    const cartToController = JSON.stringify(localStorage.getItem('steamCart'));

    const dataBasket = cartToController;

    const send = sendData(dataBasket, path, basket.header);

    send(dataBasket, path, basket.header)
      .then(response => {
        const test = response;
        if (test == 1) {
          redirect('basket/success');
          localStorage.clear('steamCart');
        } else {
          notification(
            `На счёте не достаточно средств для совершения покупки`,
            'error',
          );
        }
      })
      .catch(error => {
        console.log(error);
      });
  });
});
