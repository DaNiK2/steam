import { notification } from '../notification/swal';
import { get_session } from '../db/get_session';
import { productInCart } from './brief_cart';

let status;

for (const btn of document.querySelectorAll('.buy'))
  btn.addEventListener('click', () => addGameToCart(btn.id));

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

function addGameToCart(id) {
  get_session_id();

  if (status != undefined) {
    return false;
  }

  const base_price = document.getElementById(id);
  const price = base_price.dataset.base_price;

  const tax = document.getElementById(id);
  const game_tax = tax.dataset.tax;

  const tax_price = price * (1 - game_tax / 100);

  const cart = JSON.parse(localStorage.getItem('steamCart')) || [];

  // ищем товар в корзине
  let newProduct = cart.find(product => product.id === id);

  // если продукт уже есть в корзине, то увеличиваем его количесвтво
  // иначе добавляем новый продукт
  if (newProduct) {
    newProduct.count += 1;
    newProduct.finalPrice = Math.round(tax_price * newProduct.count);
  } else {
    newProduct = {
      id,
      game_id: id,
      tax: game_tax,
      count: 1,
      finalPrice: Math.round(tax_price),
    };
    cart.push(newProduct);
  }

  /* // если продукт уже есть в корзине, то увеличиваем его количесвтво
  // иначе добавляем новый продукт
  if (newProduct) {
    newProduct.count += 1;
  } else {
    newProduct = { id, count: 1 };
    cart.push(newProduct);
  } */

  localStorage.setItem('steamCart', JSON.stringify(cart));

  productInCart();

  notification(`Товар под номером ${id} в корзине`);
}
