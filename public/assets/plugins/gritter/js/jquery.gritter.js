(function($) {
    $.gritter = {};
    $.gritter.options = { position: '', class_name: '', fade_in_speed: 'medium', fade_out_speed: 1000, time: 6000 }
    $.gritter.add = function(params) {
        try { return Gritter.add(params || {}); } catch (e) {
            var err = 'Gritter Error: ' + e;
            (typeof(console) != 'undefined' && console.error) ? console.error(err, params): alert(err);
        }
    }
    $.gritter.remove = function(id, params) { Gritter.removeSpecific(id, params || {}); }
    $.gritter.removeAll = function(params) { Gritter.stop(params || {}); }
    var Gritter = {
        position: '',
        fade_in_speed: '',
        fade_out_speed: '',
        time: 100,
        _custom_timer: 0,
        _item_count: 0,
        _is_setup: 0,
        _tpl_close: '<a class="gritter-close" href="#" tabindex="1">Fermer</a>',
        _tpl_title: '<span class="gritter-title">[[title]]</span>',
        _tpl_item: '<div   id="gritter-item-[[number]]" class="gritter-item-wrapper [[item_class]]" style="display:none" role="alert"><div class="gritter-top"></div><div class="gritter-item">[[close]][[image]]<div class="[[class_name]]">[[title]]<p>[[text]]</p></div><div style="clear:both"></div></div><div class="gritter-bottom"></div></div>',
        _tpl_wrap: '<div id="gritter-notice-wrapper"></div>',
        add: function(params) {
            if (typeof(params) == 'string') { params = { text: params }; }
            if (params.text === null) { throw 'You must supply "text" parameter.'; }
            if (!this._is_setup) { this._runSetup(); }
            var title = params.title,
                text = params.text,
                image = params.image || '',
                sticky = params.sticky || false,
                item_class = params.class_name || $.gritter.options.class_name,
                position = $.gritter.options.position,
                time_alive = params.time || '';
            this._verifyWrapper();
            this._item_count++;
            var number = this._item_count,
                tmp = this._tpl_item;
            $(['before_open', 'after_open', 'before_close', 'after_close']).each(function(i, val) { Gritter['_' + val + '_' + number] = ($.isFunction(params[val])) ? params[val] : function() {} });
            this._custom_timer = 0;
            if (time_alive) { this._custom_timer = time_alive; }
            var image_str = (image != '') ? '<img src="' + image + '" class="gritter-image" />' : '',
                class_name = (image != '') ? 'gritter-with-image' : 'gritter-without-image';
            if (title) { title = this._str_replace('[[title]]', title, this._tpl_title); } else { title = ''; }
            tmp = this._str_replace(['[[title]]', '[[text]]', '[[close]]', '[[image]]', '[[number]]', '[[class_name]]', '[[item_class]]'], [title, text, this._tpl_close, image_str, this._item_count, class_name, item_class], tmp);
            if (this['_before_open_' + number]() === false) { return false; }
            $('#gritter-notice-wrapper').addClass(position).append(tmp);
            var item = $('#gritter-item-' + this._item_count);
            item.fadeIn(this.fade_in_speed, function() { Gritter['_after_open_' + number]($(this)); });
            if (!sticky) { this._setFadeTimer(item, number); }
            $(item).bind('mouseenter mouseleave', function(event) {
                if (event.type == 'mouseenter') { if (!sticky) { Gritter._restoreItemIfFading($(this), number); } } else { if (!sticky) { Gritter._setFadeTimer($(this), number); } }
                Gritter._hoverState($(this), event.type);
            });
            $(item).find('.gritter-close').click(function() { Gritter.removeSpecific(number, {}, null, true); return false; });
            return number;
        },
        _countRemoveWrapper: function(unique_id, e, manual_close) {
            e.remove();
            this['_after_close_' + unique_id](e, manual_close);
            if ($('.gritter-item-wrapper').length == 0) { $('#gritter-notice-wrapper').remove(); }
        },
        _fade: function(e, unique_id, params, unbind_events) {
            var params = params || {},
                fade = (typeof(params.fade) != 'undefined') ? params.fade : true,
                fade_out_speed = params.speed || this.fade_out_speed,
                manual_close = unbind_events;
            this['_before_close_' + unique_id](e, manual_close);
            if (unbind_events) { e.unbind('mouseenter mouseleave'); }
            if (fade) { e.animate({ opacity: 0 }, fade_out_speed, function() { e.animate({ height: 0 }, 300, function() { Gritter._countRemoveWrapper(unique_id, e, manual_close); }) }) } else { this._countRemoveWrapper(unique_id, e); }
        },
        _hoverState: function(e, type) {
            if (type == 'mouseenter') {
                e.addClass('hover');
                e.find('.gritter-close').show();
            } else {
                e.removeClass('hover');
                e.find('.gritter-close').hide();
            }
        },
        removeSpecific: function(unique_id, params, e, unbind_events) {
            if (!e) { var e = $('#gritter-item-' + unique_id); }
            this._fade(e, unique_id, params || {}, unbind_events);
        },
        _restoreItemIfFading: function(e, unique_id) {
            clearTimeout(this['_int_id_' + unique_id]);
            e.stop().css({ opacity: '', height: '' });
        },
        _runSetup: function() {
            for (opt in $.gritter.options) { this[opt] = $.gritter.options[opt]; }
            this._is_setup = 1;
        },
        _setFadeTimer: function(e, unique_id) {
            var timer_str = (this._custom_timer) ? this._custom_timer : this.time;
            this['_int_id_' + unique_id] = setTimeout(function() { Gritter._fade(e, unique_id); }, timer_str);
        },
        stop: function(params) {
            var before_close = ($.isFunction(params.before_close)) ? params.before_close : function() {};
            var after_close = ($.isFunction(params.after_close)) ? params.after_close : function() {};
            var wrap = $('#gritter-notice-wrapper');
            before_close(wrap);
            wrap.fadeOut(function() {
                $(this).remove();
                after_close();
            });
        },
        _str_replace: function(search, replace, subject, count) {
            var i = 0,
                j = 0,
                temp = '',
                repl = '',
                sl = 0,
                fl = 0,
                f = [].concat(search),
                r = [].concat(replace),
                s = subject,
                ra = r instanceof Array,
                sa = s instanceof Array;
            s = [].concat(s);
            if (count) { this.window[count] = 0; }
            for (i = 0, sl = s.length; i < sl; i++) {
                if (s[i] === '') { continue; }
                for (j = 0, fl = f.length; j < fl; j++) {
                    temp = s[i] + '';
                    repl = ra ? (r[j] !== undefined ? r[j] : '') : r[0];
                    s[i] = (temp).split(f[j]).join(repl);
                    if (count && s[i] !== temp) { this.window[count] += (temp.length - s[i].length) / f[j].length; }
                }
            }
            return sa ? s : s[0];
        },
        _verifyWrapper: function() { if ($('#gritter-notice-wrapper').length == 0) { $('body').append(this._tpl_wrap); } }
    }
})(jQuery);