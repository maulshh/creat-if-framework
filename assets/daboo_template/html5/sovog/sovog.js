var sovogcount = 0;
var container = $("#sovogs"),
    looking_options = [(Math.random() * 1.6) + "em", (-(Math.random() * 6) + "em")],
    speeds = ["x-slow", "slow", "normal", "fast", "x-fast"],
    color_string = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f"];
var createColor = function (range) {
    var color = "#";
    for (var i = 0; i < 6; i++) {
        if (range) {
            switch (range) {
                case "light":
                    color += color_string[(Math.floor(Math.random() * 6)) + 10];
                    break;
                case "light":
                    color += color_string[(Math.floor(Math.random() * 6)) + 5];
                    break;
                case "dark":
                    color += color_string[Math.floor(Math.random() * 6)];
                    break;
                default:
                    color += color_string[Math.floor(Math.random() * 16)];
                    break;
            }
        }
        else {
            color += color_string[Math.floor(Math.random() * 16)];
        }
    }
    return color;
};

var randomColor = function () {
    var colors = ["FFD230", "FFBF52", "EDCC82", "DCD8B2", "DCCDBC", "88B2AE", "5F8B9C", "4C6185", "404165", "D1B305", "A49286", "E0D1B4", "BDD9D6", "BDA0A0", "B8D0DE", "9FC2D6", "86B4CF", "73A2BD", "6792AB"];
    return "#" + colors[Math.floor(Math.random() * colors.length)];
}

var attrs = ["meaty", "spikes", "skinny", "short", "tall", "shifty-eyes", "jumping"],
    rare_attrs = ["flex", "sitting", "shifty", "bouncy", "blink", "sad", "dopey", "happy", "angry", "shifting", "closed-mouth", "little", "big"],
    super_rare_attrs = ["giant", "tiny", "wide-open-mouth"];
// global var

//--object sovog--
var makeSovog = function (data) {
    if(!data){
        data = {};
    }
    sovogcount++;
    var which_attrs;
    if (data.attr) {
        which_attrs = data.attr;
    } else {
        which_attrs = [];
        for (var i = 0, len = attrs.length; i < len; i++) {
            if (Math.floor(Math.random() * 2)) {
                which_attrs.push(attrs[i]);
            }
        }
        for (var i = 0, len = rare_attrs.length; i < len; i++) {
            if (Math.floor(Math.random() * 1.5)) {
                which_attrs.push(rare_attrs[i]);
            }
        }
        for (var i = 0, len = rare_attrs.length; i < len; i++) {
            if (Math.floor(Math.random() * 1.1)) {
                which_attrs.push(super_rare_attrs[i]);
            }
        }
    }
    var looking = data.looking?data.looking:looking_options[Math.floor(Math.random() * 2)],
        speed = speeds[data.speed?data.speed-1:Math.floor(Math.random() * speeds.length)],
        light_color = data.arm?data.arm:randomColor(),
        dark_color = data.body?data.body:randomColor(),
        eye_color = data.eye?data.eye:randomColor();
    this.sovogname = data.name?data.name:"sovog"+sovogcount;

    this.getElement = function(){
        var elem = '<div class="sovog';
        if (which_attrs) {
            for (var i = 0, len = which_attrs.length; i < len; i++) {
                elem += (' ' + which_attrs[i]);
            }
        }
        elem += " " + speed
        elem += '">' +
            '<div class="head">' +
                '<div class="top">' +
                    '<div class="base" style="background: ' + light_color + ';"></div>' +
                    '<div class="antennae left">' +
                        '<div class="ball" style="background: ' + dark_color + ';"></div>' +
                    '</div>' +
                    '<div class="antennae right">' +
                        '<div class="ball" style="background: ' + dark_color + ';"></div>' +
                    '</div>' +
                '</div>' +
                '<div class="face" style="background: ' + dark_color + ';">' +
                    '<div class="left-side" style="background: ' + dark_color + ';"></div>' +
                    '<div class="right-side" style="background: ' + dark_color + ';"></div>' +
                '</div>' +
                '<div class="eye left">' +
                    '<div class="eyelid" style="background: ' + light_color + ';"></div>' +
                    '<div class="eyelid-two" style="background: ' + light_color + ';"></div>' +
                    '<div class="eyeball" style="margin-left: ' + looking + '; background: ' + eye_color + ';"></div>' +
                '</div>' +
                '<div class="eye right">' +
                    '<div class="eyelid" style="background: ' + light_color + ';"></div>' +
                    '<div class="eyelid-two" style="background: ' + light_color + ';"></div>' +
                    '<div class="eyeball" style="margin-left: ' + looking + '; background: ' + eye_color + ';"></div>' +
                '</div>' +
                '<div class="mouth"></div>' +
            '</div>' +
            '<div class="neck" style="background: ' + '#FFFFFF' + ';"></div>' +
            '<div class="body">' +
                '<div class="torso" style="background: ' + dark_color + ';">' +
                    '<div class="left-side" style="background: ' + dark_color + ';"></div>' +
                    '<div class="right-side" style="background: ' + dark_color + ';"></div>' +
                '</div>' +
                '<div class="shoulder left"></div>' +
                '<div class="shoulder right"></div>' +
                '<div class="arm left" style="border-left-color: ' + light_color + ';">' +
                    '<div class="elbow"></div>' +
                    '<div class="hand" style="background: ' + dark_color + ';"></div>' +
                '</div>' +
                '<div class="arm right" style="border-right-color: ' + light_color + ';">' +
                    '<div class="elbow"></div>' +
                    '<div class="hand" style="background: ' + dark_color + ';"></div>' +
                '</div>' +
                '<div class="leg left" style="background: ' + light_color + ';">' +
                    '<div class="knee"></div>' +
                    '<div class="foot" style="background: ' + dark_color + ';"></div>' +
                '</div>' +
                '<div class="leg right" style="background: ' + light_color + ';">' +
                    '<div class="knee"></div>' +
                    '<div class="foot" style="background: ' + dark_color + ';"></div>' +
                '</div>' +
            '</div>' +
        '</div>';
        return elem;
    };


    this.getElementdestroyed = function(){
        var elem = '<div class="sovog';
        if (which_attrs) {
            for (var i = 0, len = which_attrs.length; i < len; i++) {
                elem += (' ' + which_attrs[i]);
            }
        }
        elem += " " + speed
        elem += '">' +
            '<div class="body">' +
            '<div class="torso" style="background: ' + dark_color + ';">' +

            '<div class="neck" style="background: ' + '#FFFFFF' + ';"></div>' +
            '<div class="leg left" style="background: ' + light_color + ';">' +
            '<div class="knee"></div>' +
            '<div class="shoulder left"></div>' +
            '<div class="shoulder right"></div>' +
            '<div class="foot" style="background: ' + dark_color + ';"></div>' +
            '</div>' +
            '<div class="leg right" style="background: ' + light_color + ';">' +
            '<div class="head">' +
            '<div class="top">' +
            '<div class="base" style="background: ' + light_color + ';"></div>' +
            '<div class="antennae left">' +
            '<div class="ball" style="background: ' + dark_color + ';"></div>' +
            '</div>' +
            '<div class="antennae right">' +
            '<div class="ball" style="background: ' + dark_color + ';"></div>' +
            '</div>' +
            '</div>' +
            '<div class="face" style="background: ' + dark_color + ';">' +
            '<div class="left-side" style="background: ' + dark_color + ';"></div>' +
            '<div class="right-side" style="background: ' + dark_color + ';"></div>' +
            '</div>' +
            '<div class="eye left">' +
            '<div class="eyelid" style="background: ' + light_color + ';"></div>' +
            '<div class="eyelid-two" style="background: ' + light_color + ';"></div>' +
            '<div class="eyeball" style="margin-left: ' + looking + '; background: ' + eye_color + ';"></div>' +
            '</div>' +
            '<div class="eye right">' +
            '<div class="eyelid" style="background: ' + light_color + ';"></div>' +
            '<div class="eyelid-two" style="background: ' + light_color + ';"></div>' +
            '<div class="eyeball" style="margin-left: ' + looking + '; background: ' + eye_color + ';"></div>' +
            '</div>' +
            '<div class="mouth"></div>' +
            '</div>' +
            '<div class="knee"></div>' +
            '<div class="foot" style="background: ' + dark_color + ';"></div>' +
            '</div>' +

            '<div class="arm right" style="border-right-color: ' + light_color + ';">' +
            '<div class="elbow"></div>' +
            '<div class="arm left" style="border-left-color: ' + light_color + ';">' +
            '<div class="left-side" style="background: ' + dark_color + ';"></div>' +
            '<div class="right-side" style="background: ' + dark_color + ';"></div>' +
            '</div>' +
            '<div class="elbow"></div>' +
            '<div class="hand" style="background: ' + dark_color + ';"></div>' +
            '</div>' +
            '<div class="hand" style="background: ' + dark_color + ';"></div>' +
            '</div>' +
            '</div>' +
            '</div>';
        return elem;
    };

    var element = '<div class="wrapper" id="'+ this.sovogname+'">' +
        '</div>';
    if(data.append)
        data.append.append(element);
    else
        container.append(element);

    this.sovog = $('#'+this.sovogname);

    this.destroySovog = function(){
        this.sovog.html(this.getElementdestroyed);
        this.sovog.append('<div class="button" id="' + this.sovogname + '-speak">Hi!</div>');
    };

    this.updateSovog = function(){
        this.sovog.html(this.getElement);
        //alert(this.getElement)
        this.sovog.append('<div class="button" id="' + this.sovogname + '-speak">Hi!</div>');
    };

    if(data.destroy)
        this.destroySovog();
    else
        this.updateSovog();

    this.changeSpeed = function(spd){
        speed = speeds[spd];
        this.updateSovog();
    };

    this.changeAttrs = function(atr){
        which_attrs = atr;
        this.updateSovog();
    }

    this.sovog.click(function(){
        data.click(this);
    })
}
//--object sovog--

var Scene = function(data){
    var nextscene = data.nextscene?data.nextscene:null,
        act = data.act?data.act:null;

    this.play = function(){
        act(nextscene);
        if(data.timeout){
            setTimeout(function(){
                if(nextscene != null){
                    nextscene.play()
                }
            }, data.timeout);
        }
    };

    this.setAct = function(ac){
        act = ac;
    };
};

var opened = 0,
to_open = 0;
function open_mouth(){
    if(opened < to_open){
        var moth = $(".mouth:first");
        if(moth.hasClass('hovered')){
            moth.removeClass('hovered');
        } else {
            moth.addClass('hovered');
        }
        opened++;
    }
    setTimeout('open_mouth()', 200);
}

var speak = function(data){
    $('#'+data.robot.sovogname+'-speak').html(data.text);
    to_open += data.length*2;
};

var subtitle = function(data){
    $('#subtitle').html(data.text);
    if(data.timeout){
        setTimeout(function(){
            $('#subtitle').html('');
        }, data.timeout);
    }
};