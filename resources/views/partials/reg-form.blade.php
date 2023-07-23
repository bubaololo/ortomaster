<section class="register__form">
    <div class="hystmodal" id="registerModal" aria-hidden="true">
        <div class="hystmodal__wrap">
            <div class="hystmodal__window" role="dialog" aria-modal="true">
                <button data-hystclose class="hystmodal__close" id="main_form_close">Close</button>
                <section class="form">

                    <div class="form__wrapper">
                        <form enctype="multipart/form-data" method="post" id="form">
                            <div class="form__top">
                                <h2 class="form__title">
                                    Записаться на приём
                                </h2>
                                <div class="form__input_wrapper">

                                    <input id="name" type="text" name="name" class="form_input input_name" placeholder="Имя">

                                    <input id="last_name" type="text" name="last_name" class="form_input input_lastname" placeholder="Фамилия">

                                    <!-- <input type="date" id="date" name="date" class="form_input input_date"> -->
                                    <input placeholder="Планируемая дата" class="form_input input_date" type="text" id="datepicker">

                                    <select name="time" id="time" class="form_input input_time gray_select gray">
                                        <option value="" disabled selected>Время</option>
                                        <option value="8">8:00</option>
                                        <option value="12">12:00</option>
                                        <option value="14">14:00</option>
                                        <option value="16">16:00</option>
                                    </select>
                                    <select name="service_type" id="service_type" class="form_input input_service gray_select gray">
                                        <option value="" disabled selected>Выберите тип услуги</option>
                                        <option value="service_items1">Массаж</option>
                                        <option value="service_items2">Косметолог</option>
                                        <option value="service_items3">Оториноларинголог</option>
                                    </select>
                                    <input id="phone" type="tel" name="phone" class="form_input input_phone" placeholder="+7___-___-__-__">
                                </div>
                                <div class="custom__services">
                                    <select name="service_items1" id="service_items1" class="form_input hide">
                                        <option value="" class="select_placeholder ">Взрослый массаж</option>
                                        <option value="">Детский массаж</option>
                                        <option value="">Женский массаж</option>
                                    </select>
                                    <select name="service_items2" id="service_items2" class="form_input hide">
                                        <option value="" class="select_placeholder">Косметолог</option>
                                        <option value="">Прыщи</option>
                                        <option value="">Угри</option>
                                    </select>
                                    <select name="service_items2" id="service_items3" class="form_input hide">
                                        <option value="massage" class="select_placeholder">Оториноларинголог</option>
                                        <option value="">ухо</option>
                                        <option value="">горло</option>
                                        <option value="">нос</option>
                                    </select>
                                </div>
                                <textarea id="comment" name="comment" class="form_input input_comment" placeholder="Комментарий к записи"></textarea>
                            </div>
                            <div class="form__bottom">

                                <div class="form__send_button">
                                    <!-- <a href="#" class="header__button button" data-hystmodal="#myModal">
                                        Записаться на приём
                                    </a> -->
                                    <button data-hystmodal="#registerModal" class="submit_button button blue_button">Отправить</button>
                                    <input type="submit" id="register_submit" class="submit_btn">
                                </div>
                                <div class="checkbox__wrapper">
                                    <label class="check option">
                                        <input type="checkbox" id="check" name="check" required class="check__input">
                                        <span class="check__box"></span>
                                    </label>

                                    <div class="checkbox__disclaimer">
                                        Я согласен с правилами обработки персональных данных и ознакомлен с <a href="#">Политикой конфидециальности</a>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>

            </div>
</section>
