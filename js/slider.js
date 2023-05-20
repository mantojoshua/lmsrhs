(function(f, g, c, h, e, k, i) {
    /*! Jssor */
    new (function() {}
    );
    var d = {
        nd: function(a) {
            return a
        },
        Jd: function(a) {
            return -a * (a - 2)
        },
        Od: function(a) {
            return (a -= 1) * a * a * a * a + 1
        }
    };
    var b = new function() {
        var j = this, Ab = /\S+/g, F = 1, yb = 2, fb = 3, eb = 4, jb = 5, G, r = 0, l = 0, s = 0, Y = 0, A = 0, I = navigator, ob = I.appName, o = I.userAgent, p = parseFloat;
        function Ib() {
            if (!G) {
                G = {
                    le: "ontouchstart"in f || "createTouch"in g
                };
                var a;
                if (I.pointerEnabled || (a = I.msPointerEnabled))
                    G.ld = a ? "msTouchAction" : "touchAction"
            }
            return G
        }
        function v(i) {
            if (!r) {
                r = -1;
                if (ob == "Microsoft Internet Explorer" && !!f.attachEvent && !!f.ActiveXObject) {
                    var e = o.indexOf("MSIE");
                    r = F;
                    s = p(o.substring(e + 5, o.indexOf(";", e)));
                    /*@cc_on Y=@_jscript_version@*/
                    ;l = g.documentMode || s
                } else if (ob == "Netscape" && !!f.addEventListener) {
                    var d = o.indexOf("Firefox")
                      , b = o.indexOf("Safari")
                      , h = o.indexOf("Chrome")
                      , c = o.indexOf("AppleWebKit");
                    if (d >= 0) {
                        r = yb;
                        l = p(o.substring(d + 8))
                    } else if (b >= 0) {
                        var j = o.substring(0, b).lastIndexOf("/");
                        r = h >= 0 ? eb : fb;
                        l = p(o.substring(j + 1, b))
                    } else {
                        var a = /Trident\/.*rv:([0-9]{1,}[\.0-9]{0,})/i.exec(o);
                        if (a) {
                            r = F;
                            l = s = p(a[1])
                        }
                    }
                    if (c >= 0)
                        A = p(o.substring(c + 12))
                } else {
                    var a = /(opera)(?:.*version|)[ \/]([\w.]+)/i.exec(o);
                    if (a) {
                        r = jb;
                        l = p(a[2])
                    }
                }
            }
            return i == r
        }
        function q() {
            return v(F)
        }
        function Q() {
            return q() && (l < 6 || g.compatMode == "BackCompat")
        }
        function db() {
            return v(fb)
        }
        function ib() {
            return v(jb)
        }
        function vb() {
            return db() && A > 534 && A < 535
        }
        function J() {
            v();
            return A > 537 || l > 42 || r == F && l >= 11
        }
        function O() {
            return q() && l < 9
        }
        function wb(a) {
            var b, c;
            return function(f) {
                if (!b) {
                    b = e;
                    var d = a.substr(0, 1).toUpperCase() + a.substr(1);
                    n([a].concat(["WebKit", "ms", "Moz", "O", "webkit"]), function(g, e) {
                        var b = a;
                        if (e)
                            b = g + d;
                        if (f.style[b] != i)
                            return c = b
                    })
                }
                return c
            }
        }
        function ub(b) {
            var a;
            return function(c) {
                a = a || wb(b)(c) || b;
                return a
            }
        }
        var K = ub("transform");
        function nb(a) {
            return {}.toString.call(a)
        }
        var kb = {};
        n(["Boolean", "Number", "String", "Function", "Array", "Date", "RegExp", "Object"], function(a) {
            kb["[object " + a + "]"] = a.toLowerCase()
        });
        function n(b, d) {
            var a, c;
            if (nb(b) == "[object Array]") {
                for (a = 0; a < b.length; a++)
                    if (c = d(b[a], a, b))
                        return c
            } else
                for (a in b)
                    if (c = d(b[a], a, b))
                        return c
        }
        function D(a) {
            return a == h ? String(a) : kb[nb(a)] || "object"
        }
        function lb(a) {
            for (var b in a)
                return e
        }
        function B(a) {
            try {
                return D(a) == "object" && !a.nodeType && a != a.window && (!a.constructor || {}.hasOwnProperty.call(a.constructor.prototype, "isPrototypeOf"))
            } catch (b) {}
        }
        function u(a, b) {
            return {
                x: a,
                y: b
            }
        }
        function rb(b, a) {
            setTimeout(b, a || 0)
        }
        function H(b, d, c) {
            var a = !b || b == "inherit" ? "" : b;
            n(d, function(c) {
                var b = c.exec(a);
                if (b) {
                    var d = a.substr(0, b.index)
                      , e = a.substr(b.index + b[0].length + 1, a.length - 1);
                    a = d + e
                }
            });
            a = c + (!a.indexOf(" ") ? "" : " ") + a;
            return a
        }
        function tb(b, a) {
            if (l < 9)
                b.style.filter = a
        }
        j.Ie = Ib;
        j.gd = q;
        j.Ne = db;
        j.Ue = J;
        wb("transform");
        j.sc = function() {
            return l
        }
        ;
        j.tc = rb;
        function X(a) {
            a.constructor === X.caller && a.uc && a.uc.apply(a, X.caller.arguments)
        }
        j.uc = X;
        j.fb = function(a) {
            if (j.ve(a))
                a = g.getElementById(a);
            return a
        }
        ;
        function t(a) {
            return a || f.event
        }
        j.wc = t;
        j.Zb = function(b) {
            b = t(b);
            var a = b.target || b.srcElement || g;
            if (a.nodeType == 3)
                a = j.xc(a);
            return a
        }
        ;
        j.Ac = function(a) {
            a = t(a);
            return {
                x: a.pageX || a.clientX || 0,
                y: a.pageY || a.clientY || 0
            }
        }
        ;
        function w(c, d, a) {
            if (a !== i)
                c.style[d] = a == i ? "" : a;
            else {
                var b = c.currentStyle || c.style;
                a = b[d];
                if (a == "" && f.getComputedStyle) {
                    b = c.ownerDocument.defaultView.getComputedStyle(c, h);
                    b && (a = b.getPropertyValue(d) || b[d])
                }
                return a
            }
        }
        function ab(b, c, a, d) {
            if (a !== i) {
                if (a == h)
                    a = "";
                else
                    d && (a += "px");
                w(b, c, a)
            } else
                return p(w(b, c))
        }
        function m(c, a) {
            var d = a ? ab : w, b;
            if (a & 4)
                b = ub(c);
            return function(e, f) {
                return d(e, b ? b(e) : c, f, a & 2)
            }
        }
        function Db(b) {
            if (q() && s < 9) {
                var a = /opacity=([^)]*)/.exec(b.style.filter || "");
                return a ? p(a[1]) / 100 : 1
            } else
                return p(b.style.opacity || "1")
        }
        function Fb(b, a, f) {
            if (q() && s < 9) {
                var h = b.style.filter || ""
                  , i = new RegExp(/[\s]*alpha\([^\)]*\)/g)
                  , e = c.round(100 * a)
                  , d = "";
                if (e < 100 || f)
                    d = "alpha(opacity=" + e + ") ";
                var g = H(h, [i], d);
                tb(b, g)
            } else
                b.style.opacity = a == 1 ? "" : c.round(a * 100) / 100
        }
        var L = {
            eb: ["rotate"],
            M: ["rotateX"],
            T: ["rotateY"],
            Ab: ["skewX"],
            zb: ["skewY"]
        };
        if (!J())
            L = C(L, {
                n: ["scaleX", 2],
                q: ["scaleY", 2],
                E: ["translateZ", 1]
            });
        function M(d, a) {
            var c = "";
            if (a) {
                if (q() && l && l < 10) {
                    delete a.M;
                    delete a.T;
                    delete a.E
                }
                b.f(a, function(d, b) {
                    var a = L[b];
                    if (a) {
                        var e = a[1] || 0;
                        if (N[b] != d)
                            c += " " + a[0] + "(" + d + (["deg", "px", ""])[e] + ")"
                    }
                });
                if (J()) {
                    if (a.bb || a.cb || a.E != i)
                        c += " translate3d(" + (a.bb || 0) + "px," + (a.cb || 0) + "px," + (a.E || 0) + "px)";
                    if (a.n == i)
                        a.n = 1;
                    if (a.q == i)
                        a.q = 1;
                    if (a.n != 1 || a.q != 1)
                        c += " scale3d(" + a.n + ", " + a.q + ", 1)"
                }
            }
            d.style[K(d)] = c
        }
        j.Nc = m("transformOrigin", 4);
        j.Ae = m("backfaceVisibility", 4);
        j.Be = m("transformStyle", 4);
        j.De = m("perspective", 6);
        j.Fe = m("perspectiveOrigin", 4);
        j.Je = function(a, b) {
            if (q() && s < 9 || s < 10 && Q())
                a.style.zoom = b == 1 ? "" : b;
            else {
                var c = K(a)
                  , f = "scale(" + b + ")"
                  , e = a.style[c]
                  , g = new RegExp(/[\s]*scale\(.*?\)/g)
                  , d = H(e, [g], f);
                a.style[c] = d
            }
        }
        ;
        j.Sb = function(b, a) {
            return function(c) {
                c = t(c);
                var e = c.type
                  , d = c.relatedTarget || (e == "mouseout" ? c.toElement : c.fromElement);
                (!d || d !== a && !j.Ge(a, d)) && b(c)
            }
        }
        ;
        j.a = function(a, d, b, c) {
            a = j.fb(a);
            if (a.addEventListener) {
                d == "mousewheel" && a.addEventListener("DOMMouseScroll", b, c);
                a.addEventListener(d, b, c)
            } else if (a.attachEvent) {
                a.attachEvent("on" + d, b);
                c && a.setCapture && a.setCapture()
            }
        }
        ;
        j.C = function(a, c, d, b) {
            a = j.fb(a);
            if (a.removeEventListener) {
                c == "mousewheel" && a.removeEventListener("DOMMouseScroll", d, b);
                a.removeEventListener(c, d, b)
            } else if (a.detachEvent) {
                a.detachEvent("on" + c, d);
                b && a.releaseCapture && a.releaseCapture()
            }
        }
        ;
        j.Db = function(a) {
            a = t(a);
            a.preventDefault && a.preventDefault();
            a.cancel = e;
            a.returnValue = k
        }
        ;
        j.xe = function(a) {
            a = t(a);
            a.stopPropagation && a.stopPropagation();
            a.cancelBubble = e
        }
        ;
        j.D = function(d, c) {
            var a = [].slice.call(arguments, 2)
              , b = function() {
                var b = a.concat([].slice.call(arguments, 0));
                return c.apply(d, b)
            };
            return b
        }
        ;
        j.se = function(a, b) {
            if (b == i)
                return a.textContent || a.innerText;
            var c = g.createTextNode(b);
            j.Ob(a);
            a.appendChild(c)
        }
        ;
        j.xb = function(d, c) {
            for (var b = [], a = d.firstChild; a; a = a.nextSibling)
                (c || a.nodeType == 1) && b.push(a);
            return b
        }
        ;
        function mb(a, c, e, b) {
            b = b || "u";
            for (a = a ? a.firstChild : h; a; a = a.nextSibling)
                if (a.nodeType == 1) {
                    if (U(a, b) == c)
                        return a;
                    if (!e) {
                        var d = mb(a, c, e, b);
                        if (d)
                            return d
                    }
                }
        }
        j.B = mb;
        function S(a, d, f, b) {
            b = b || "u";
            var c = [];
            for (a = a ? a.firstChild : h; a; a = a.nextSibling)
                if (a.nodeType == 1) {
                    U(a, b) == d && c.push(a);
                    if (!f) {
                        var e = S(a, d, f, b);
                        if (e.length)
                            c = c.concat(e)
                    }
                }
            return c
        }
        function gb(a, c, d) {
            for (a = a ? a.firstChild : h; a; a = a.nextSibling)
                if (a.nodeType == 1) {
                    if (a.tagName == c)
                        return a;
                    if (!d) {
                        var b = gb(a, c, d);
                        if (b)
                            return b
                    }
                }
        }
        j.Re = gb;
        j.Qe = function(b, a) {
            return b.getElementsByTagName(a)
        }
        ;
        function C() {
            var e = arguments, d, c, b, a, g = 1 & e[0], f = 1 + g;
            d = e[f - 1] || {};
            for (; f < e.length; f++)
                if (c = e[f])
                    for (b in c) {
                        a = c[b];
                        if (a !== i) {
                            a = c[b];
                            var h = d[b];
                            d[b] = g && (B(h) || B(a)) ? C(g, {}, h, a) : a
                        }
                    }
            return d
        }
        j.ab = C;
        function Z(f, g) {
            var d = {}, c, a, b;
            for (c in f) {
                a = f[c];
                b = g[c];
                if (a !== b) {
                    var e;
                    if (B(a) && B(b)) {
                        a = Z(a, b);
                        e = !lb(a)
                    }
                    !e && (d[c] = a)
                }
            }
            return d
        }
        j.Jc = function(a) {
            return D(a) == "function"
        }
        ;
        j.ve = function(a) {
            return D(a) == "string"
        }
        ;
        j.Le = function(a) {
            return !isNaN(p(a)) && isFinite(a)
        }
        ;
        j.f = n;
        function R(a) {
            return g.createElement(a)
        }
        j.Bb = function() {
            return R("DIV")
        }
        ;
        j.Se = function() {
            return R("SPAN")
        }
        ;
        j.Kc = function() {}
        ;
        function V(b, c, a) {
            if (a == i)
                return b.getAttribute(c);
            b.setAttribute(c, a)
        }
        function U(a, b) {
            return V(a, b) || V(a, "data-" + b)
        }
        j.o = V;
        j.g = U;
        function y(b, a) {
            if (a == i)
                return b.className;
            b.className = a
        }
        j.qc = y;
        function qb(b) {
            var a = {};
            n(b, function(b) {
                if (b != i)
                    a[b] = b
            });
            return a
        }
        function sb(b, a) {
            return b.match(a || Ab)
        }
        function P(b, a) {
            return qb(sb(b || "", a))
        }
        j.od = sb;
        function bb(b, c) {
            var a = "";
            n(c, function(c) {
                a && (a += b);
                a += c
            });
            return a
        }
        function E(a, c, b) {
            y(a, bb(" ", C(Z(P(y(a)), P(c)), P(b))))
        }
        j.xc = function(a) {
            return a.parentNode
        }
        ;
        j.J = function(a) {
            j.H(a, "none")
        }
        ;
        j.L = function(a, b) {
            j.H(a, b ? "none" : "")
        }
        ;
        j.vd = function(b, a) {
            b.removeAttribute(a)
        }
        ;
        j.Cd = function() {
            return q() && l < 10
        }
        ;
        j.ud = function(d, a) {
            if (a)
                d.style.clip = "rect(" + c.round(a.l || a.s || 0) + "px " + c.round(a.z) + "px " + c.round(a.u) + "px " + c.round(a.k || a.p || 0) + "px)";
            else if (a !== i) {
                var g = d.style.cssText
                  , f = [new RegExp(/[\s]*clip: rect\(.*?\)[;]?/i), new RegExp(/[\s]*cliptop: .*?[;]?/i), new RegExp(/[\s]*clipright: .*?[;]?/i), new RegExp(/[\s]*clipbottom: .*?[;]?/i), new RegExp(/[\s]*clipleft: .*?[;]?/i)]
                  , e = H(g, f, "");
                b.wb(d, e)
            }
        }
        ;
        j.O = function() {
            return +new Date
        }
        ;
        j.R = function(b, a) {
            b.appendChild(a)
        }
        ;
        j.Ib = function(b, a, c) {
            (c || a.parentNode).insertBefore(b, a)
        }
        ;
        j.Fb = function(b, a) {
            a = a || b.parentNode;
            a && a.removeChild(b)
        }
        ;
        j.sd = function(a, b) {
            n(a, function(a) {
                j.Fb(a, b)
            })
        }
        ;
        j.Ob = function(a) {
            j.sd(j.xb(a, e), a)
        }
        ;
        j.rd = function(a, b) {
            var c = j.xc(a);
            b & 1 && j.G(a, (j.j(c) - j.j(a)) / 2);
            b & 2 && j.F(a, (j.m(c) - j.m(a)) / 2)
        }
        ;
        j.qd = function(b, a) {
            return parseInt(b, a || 10)
        }
        ;
        j.pd = p;
        j.Ge = function(b, a) {
            var c = g.body;
            while (a && b !== a && c !== a)
                try {
                    a = a.parentNode
                } catch (d) {
                    return k
                }
            return b === a
        }
        ;
        function W(d, c, b) {
            var a = d.cloneNode(!c);
            !b && j.vd(a, "id");
            return a
        }
        j.ib = W;
        j.jb = function(d, f) {
            var a = new Image;
            function b(e, d) {
                j.C(a, "load", b);
                j.C(a, "abort", c);
                j.C(a, "error", c);
                f && f(a, d)
            }
            function c(a) {
                b(a, e)
            }
            if (ib() && l < 11.6 || !d)
                b(!d);
            else {
                j.a(a, "load", b);
                j.a(a, "abort", c);
                j.a(a, "error", c);
                a.src = d
            }
        }
        ;
        j.zd = function(d, a, e) {
            var c = d.length + 1;
            function b(b) {
                c--;
                if (a && b && b.src == a.src)
                    a = b;
                !c && e && e(a)
            }
            n(d, function(a) {
                j.jb(a.src, b)
            });
            b()
        }
        ;
        j.Ed = function(a, g, i, h) {
            if (h)
                a = W(a);
            var c = S(a, g);
            if (!c.length)
                c = b.Qe(a, g);
            for (var f = c.length - 1; f > -1; f--) {
                var d = c[f]
                  , e = W(i);
                y(e, y(d));
                b.wb(e, d.style.cssText);
                b.Ib(e, d);
                b.Fb(d)
            }
            return a
        }
        ;
        function Gb(a) {
            var l = this, p = "", r = ["av", "pv", "ds", "dn"], e = [], q, k = 0, f = 0, d = 0;
            function h() {
                E(a, q, e[d || k || f & 2 || f]);
                b.P(a, "pointer-events", d ? "none" : "")
            }
            function c() {
                k = 0;
                h();
                j.C(g, "mouseup", c);
                j.C(g, "touchend", c);
                j.C(g, "touchcancel", c)
            }
            function o(a) {
                if (d)
                    j.Db(a);
                else {
                    k = 4;
                    h();
                    j.a(g, "mouseup", c);
                    j.a(g, "touchend", c);
                    j.a(g, "touchcancel", c)
                }
            }
            l.he = function(a) {
                if (a === i)
                    return f;
                f = a & 2 || a & 1;
                h()
            }
            ;
            l.Gb = function(a) {
                if (a === i)
                    return !d;
                d = a ? 0 : 3;
                h()
            }
            ;
            l.V = a = j.fb(a);
            var m = b.od(y(a));
            if (m)
                p = m.shift();
            n(r, function(a) {
                e.push(p + a)
            });
            q = bb(" ", e);
            e.unshift("");
            j.a(a, "mousedown", o);
            j.a(a, "touchstart", o)
        }
        j.gc = function(a) {
            return new Gb(a)
        }
        ;
        j.P = w;
        j.Hb = m("overflow");
        j.F = m("top", 2);
        j.G = m("left", 2);
        j.j = m("width", 2);
        j.m = m("height", 2);
        j.hc = m("marginLeft", 2);
        j.nc = m("marginTop", 2);
        j.A = m("position");
        j.H = m("display");
        j.v = m("zIndex", 1);
        j.ic = function(b, a, c) {
            if (a != i)
                Fb(b, a, c);
            else
                return Db(b)
        }
        ;
        j.wb = function(a, b) {
            if (b != i)
                a.style.cssText = b;
            else
                return a.style.cssText
        }
        ;
        j.ge = function(b, a) {
            if (a === i) {
                a = w(b, "backgroundImage") || "";
                var c = /\burl\s*\(\s*["']?([^"'\r\n,]+)["']?\s*\)/gi.exec(a) || [];
                return c[1]
            }
            w(b, "backgroundImage", a ? "url('" + a + "')" : "")
        }
        ;
        var T = {
            tb: j.ic,
            l: j.F,
            k: j.G,
            Jb: j.j,
            Kb: j.m,
            ub: j.A,
            df: j.H,
            rb: j.v
        };
        function x(f, l) {
            var e = O()
              , b = J()
              , d = vb()
              , g = K(f);
            function k(b, d, a) {
                var e = b.W(u(-d / 2, -a / 2))
                  , f = b.W(u(d / 2, -a / 2))
                  , g = b.W(u(d / 2, a / 2))
                  , h = b.W(u(-d / 2, a / 2));
                b.W(u(300, 300));
                return u(c.min(e.x, f.x, g.x, h.x) + d / 2, c.min(e.y, f.y, g.y, h.y) + a / 2)
            }
            function a(d, a) {
                a = a || {};
                var n = a.E || 0
                  , p = (a.M || 0) % 360
                  , q = (a.T || 0) % 360
                  , u = (a.eb || 0) % 360
                  , l = a.n
                  , m = a.q
                  , f = a.cf;
                if (l == i)
                    l = 1;
                if (m == i)
                    m = 1;
                if (f == i)
                    f = 1;
                if (e) {
                    n = 0;
                    p = 0;
                    q = 0;
                    f = 0
                }
                var c = new Cb(a.bb,a.cb,n);
                c.M(p);
                c.T(q);
                c.be(u);
                c.Fd(a.Ab, a.zb);
                c.mc(l, m, f);
                if (b) {
                    c.lb(a.p, a.s);
                    d.style[g] = c.Zd()
                } else if (!Y || Y < 9) {
                    var o = ""
                      , h = {
                        x: 0,
                        y: 0
                    };
                    if (a.U)
                        h = k(c, a.U, a.Z);
                    j.nc(d, h.y);
                    j.hc(d, h.x);
                    o = c.Yd();
                    var s = d.style.filter
                      , t = new RegExp(/[\s]*progid:DXImageTransform\.Microsoft\.Matrix\([^\)]*\)/g)
                      , r = H(s, [t], o);
                    tb(d, r)
                }
            }
            x = function(e, c) {
                c = c || {};
                var g = c.p, k = c.s, f;
                n(T, function(a, b) {
                    f = c[b];
                    f !== i && a(e, f)
                });
                j.ud(e, c.c);
                if (!b) {
                    g != i && j.G(e, (c.Hc || 0) + g);
                    k != i && j.F(e, (c.yc || 0) + k)
                }
                if (c.Vd)
                    if (d)
                        rb(j.D(h, M, e, c));
                    else
                        a(e, c)
            }
            ;
            j.pb = M;
            if (d)
                j.pb = x;
            if (e)
                j.pb = a;
            else if (!b)
                a = M;
            j.K = x;
            x(f, l)
        }
        j.pb = x;
        j.K = x;
        function Cb(j, k, o) {
            var d = this
              , b = [1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, j || 0, k || 0, o || 0, 1]
              , i = c.sin
              , g = c.cos
              , l = c.tan;
            function f(a) {
                return a * c.PI / 180
            }
            function n(a, b) {
                return {
                    x: a,
                    y: b
                }
            }
            function m(c, e, l, m, o, r, t, u, w, z, A, C, E, b, f, k, a, g, i, n, p, q, s, v, x, y, B, D, F, d, h, j) {
                return [c * a + e * p + l * x + m * F, c * g + e * q + l * y + m * d, c * i + e * s + l * B + m * h, c * n + e * v + l * D + m * j, o * a + r * p + t * x + u * F, o * g + r * q + t * y + u * d, o * i + r * s + t * B + u * h, o * n + r * v + t * D + u * j, w * a + z * p + A * x + C * F, w * g + z * q + A * y + C * d, w * i + z * s + A * B + C * h, w * n + z * v + A * D + C * j, E * a + b * p + f * x + k * F, E * g + b * q + f * y + k * d, E * i + b * s + f * B + k * h, E * n + b * v + f * D + k * j]
            }
            function e(c, a) {
                return m.apply(h, (a || b).concat(c))
            }
            d.mc = function(a, c, d) {
                if (a != 1 || c != 1 || d != 1)
                    b = e([a, 0, 0, 0, 0, c, 0, 0, 0, 0, d, 0, 0, 0, 0, 1])
            }
            ;
            d.lb = function(a, c, d) {
                b[12] += a || 0;
                b[13] += c || 0;
                b[14] += d || 0
            }
            ;
            d.M = function(c) {
                if (c) {
                    a = f(c);
                    var d = g(a)
                      , h = i(a);
                    b = e([1, 0, 0, 0, 0, d, h, 0, 0, -h, d, 0, 0, 0, 0, 1])
                }
            }
            ;
            d.T = function(c) {
                if (c) {
                    a = f(c);
                    var d = g(a)
                      , h = i(a);
                    b = e([d, 0, -h, 0, 0, 1, 0, 0, h, 0, d, 0, 0, 0, 0, 1])
                }
            }
            ;
            d.be = function(c) {
                if (c) {
                    a = f(c);
                    var d = g(a)
                      , h = i(a);
                    b = e([d, h, 0, 0, -h, d, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1])
                }
            }
            ;
            d.Fd = function(a, c) {
                if (a || c) {
                    j = f(a);
                    k = f(c);
                    b = e([1, l(k), 0, 0, l(j), 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1])
                }
            }
            ;
            d.W = function(c) {
                var a = e(b, [1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, c.x, c.y, 0, 1]);
                return n(a[12], a[13])
            }
            ;
            d.Zd = function() {
                return "matrix3d(" + b.join(",") + ")"
            }
            ;
            d.Yd = function() {
                return "progid:DXImageTransform.Microsoft.Matrix(M11=" + b[0] + ", M12=" + b[4] + ", M21=" + b[1] + ", M22=" + b[5] + ", SizingMethod='auto expand')"
            }
        }
        new function() {
            var a = this;
            function b(d, g) {
                for (var j = d[0].length, i = d.length, h = g[0].length, f = [], c = 0; c < i; c++)
                    for (var k = f[c] = [], b = 0; b < h; b++) {
                        for (var e = 0, a = 0; a < j; a++)
                            e += d[c][a] * g[a][b];
                        k[b] = e
                    }
                return f
            }
            a.n = function(b, c) {
                return a.Fc(b, c, 0)
            }
            ;
            a.q = function(b, c) {
                return a.Fc(b, 0, c)
            }
            ;
            a.Fc = function(a, c, d) {
                return b(a, [[c, 0], [0, d]])
            }
            ;
            a.W = function(d, c) {
                var a = b(d, [[c.x], [c.y]]);
                return u(a[0][0], a[1][0])
            }
        }
        ;
        var N = {
            Hc: 0,
            yc: 0,
            p: 0,
            s: 0,
            db: 1,
            n: 1,
            q: 1,
            eb: 0,
            M: 0,
            T: 0,
            bb: 0,
            cb: 0,
            E: 0,
            Ab: 0,
            zb: 0
        };
        j.Sd = function(c, d) {
            var a = c || {};
            if (c)
                if (b.Jc(c))
                    a = {
                        I: a
                    };
                else if (b.Jc(c.c))
                    a.c = {
                        I: c.c
                    };
            a.I = a.I || d;
            if (a.c)
                a.c.I = a.c.I || d;
            return a
        }
        ;
        j.Pd = function(l, m, x, q, z, A, n) {
            var a = m;
            if (l) {
                a = {};
                for (var g in m) {
                    var B = A[g] || 1
                      , w = z[g] || [0, 1]
                      , f = (x - w[0]) / w[1];
                    f = c.min(c.max(f, 0), 1);
                    f = f * B;
                    var u = c.floor(f);
                    if (f != u)
                        f -= u;
                    var j = q.I || d.nd, k, C = l[g], o = m[g];
                    if (b.Le(o)) {
                        j = q[g] || j;
                        var y = j(f);
                        k = C + o * y
                    } else {
                        k = b.ab({
                            Lb: {}
                        }, l[g]);
                        var v = q[g] || {};
                        b.f(o.Lb || o, function(d, a) {
                            j = v[a] || v.I || j;
                            var c = j(f)
                              , b = d * c;
                            k.Lb[a] = b;
                            k[a] += b
                        })
                    }
                    a[g] = k
                }
                var t = b.f(m, function(b, a) {
                    return N[a] != i
                });
                t && b.f(N, function(c, b) {
                    if (a[b] == i && l[b] !== i)
                        a[b] = l[b]
                });
                if (t) {
                    if (a.db)
                        a.n = a.q = a.db;
                    a.U = n.U;
                    a.Z = n.Z;
                    a.Vd = e
                }
            }
            if (m.c && n.lb) {
                var p = a.c.Lb
                  , s = (p.l || 0) + (p.u || 0)
                  , r = (p.k || 0) + (p.z || 0);
                a.k = (a.k || 0) + r;
                a.l = (a.l || 0) + s;
                a.c.k -= r;
                a.c.z -= r;
                a.c.l -= s;
                a.c.u -= s
            }
            if (a.c && b.Cd() && !a.c.l && !a.c.k && !a.c.s && !a.c.p && a.c.z == n.U && a.c.u == n.Z)
                a.c = h;
            return a
        }
    }
    ;
    function m() {
        var a = this
          , d = [];
        function i(a, b) {
            d.push({
                Pb: a,
                Qb: b
            })
        }
        function h(a, c) {
            b.f(d, function(b, e) {
                b.Pb == a && b.Qb === c && d.splice(e, 1)
            })
        }
        a.mb = a.addEventListener = i;
        a.removeEventListener = h;
        a.i = function(a) {
            var c = [].slice.call(arguments, 1);
            b.f(d, function(b) {
                b.Pb == a && b.Qb.apply(f, c)
            })
        }
    }
    var l = function(z, E, g, K, N, M) {
        z = z || 0;
        var a = this, q, o, p, u, B = 0, H, I, G, C, y = 0, j = 0, m = 0, F, l, i, d, n, D, w = [], x;
        function P(a) {
            i += a;
            d += a;
            l += a;
            j += a;
            m += a;
            y += a
        }
        function t(p) {
            var f = p;
            if (n)
                if (!D && (f >= d || f < i) || D && f >= n)
                    f = ((f - i) % n + n) % n + i;
            if (!F || u || j != f) {
                var h = c.min(f, d);
                h = c.max(h, i);
                if (!F || u || h != m) {
                    if (M) {
                        var k = (h - l) / (E || 1);
                        if (g.Kd)
                            k = 1 - k;
                        var o = b.Pd(N, M, k, H, G, I, g);
                        if (x)
                            b.f(o, function(b, a) {
                                x[a] && x[a](K, b)
                            });
                        else
                            b.K(K, o)
                    }
                    a.Vb(m - l, h - l);
                    var r = m
                      , q = m = h;
                    b.f(w, function(b, c) {
                        var a = f <= j ? w[w.length - c - 1] : b;
                        a.Q(m - y)
                    });
                    j = f;
                    F = e;
                    a.Mb(r, q)
                }
            }
        }
        function A(a, b, e) {
            b && a.Ub(d);
            if (!e) {
                i = c.min(i, a.Ic() + y);
                d = c.max(d, a.Xb() + y)
            }
            w.push(a)
        }
        var r = f.requestAnimationFrame || f.webkitRequestAnimationFrame || f.mozRequestAnimationFrame || f.msRequestAnimationFrame;
        if (b.Ne() && b.sc() < 7)
            r = h;
        r = r || function(a) {
            b.tc(a, g.Gc)
        }
        ;
        function J() {
            if (q) {
                var d = b.O()
                  , e = c.min(d - B, g.Mc)
                  , a = j + e * p;
                B = d;
                if (a * p >= o * p)
                    a = o;
                t(a);
                if (!u && a * p >= o * p)
                    L(C);
                else
                    r(J)
            }
        }
        function s(f, g, h) {
            if (!q) {
                q = e;
                u = h;
                C = g;
                f = c.max(f, i);
                f = c.min(f, d);
                o = f;
                p = o < j ? -1 : 1;
                a.Ec();
                B = b.O();
                r(J)
            }
        }
        function L(b) {
            if (q) {
                u = q = C = k;
                a.Dc();
                b && b()
            }
        }
        a.Cc = function(a, b, c) {
            s(a ? j + a : d, b, c)
        }
        ;
        a.Bc = s;
        a.X = L;
        a.Id = function(a) {
            s(a)
        }
        ;
        a.N = function() {
            return j
        }
        ;
        a.rc = function() {
            return o
        }
        ;
        a.kb = function() {
            return m
        }
        ;
        a.Q = t;
        a.lb = function(a) {
            t(j + a)
        }
        ;
        a.vc = function() {
            return q
        }
        ;
        a.Ld = function(a) {
            n = a
        }
        ;
        a.Ub = P;
        a.Lc = function(a, b) {
            A(a, 0, b)
        }
        ;
        a.dc = function(a) {
            A(a, 1)
        }
        ;
        a.Ic = function() {
            return i
        }
        ;
        a.Xb = function() {
            return d
        }
        ;
        a.Mb = a.Ec = a.Dc = a.Vb = b.Kc;
        a.cc = b.O();
        g = b.ab({
            Gc: 16,
            Mc: 50
        }, g);
        n = g.pc;
        D = g.Td;
        x = g.ce;
        i = l = z;
        d = z + E;
        I = g.de || {};
        G = g.ee || {};
        H = b.Sd(g.qb)
    };
    new (function() {}
    );
    var j = function(p, fc) {
        var o = this;
        function Bc() {
            var a = this;
            l.call(a, -1e8, 2e8);
            a.Te = function() {
                var b = a.kb()
                  , d = c.floor(b)
                  , f = t(d)
                  , e = b - c.floor(b);
                return {
                    Y: f,
                    ke: d,
                    ub: e
                }
            }
            ;
            a.Mb = function(b, a) {
                var d = c.floor(a);
                if (d != a && a > b)
                    d++;
                Tb(d, e);
                o.i(j.oe, t(a), t(b), a, b)
            }
        }
        function Ac() {
            var a = this;
            l.call(a, 0, 0, {
                pc: r
            });
            b.f(C, function(b) {
                D & 1 && b.Ld(r);
                a.dc(b);
                b.Ub(kb / bc)
            })
        }
        function zc() {
            var a = this
              , b = Ub.V;
            l.call(a, -1, 2, {
                qb: d.nd,
                ce: {
                    ub: Zb
                },
                pc: r
            }, b, {
                ub: 1
            }, {
                ub: -2
            });
            a.Yb = b
        }
        function mc(n, m) {
            var b = this, d, f, g, i, c;
            l.call(b, -1e8, 2e8, {
                Mc: 100
            });
            b.Ec = function() {
                O = e;
                R = h;
                o.i(j.pe, t(w.N()), w.N())
            }
            ;
            b.Dc = function() {
                O = k;
                i = k;
                var a = w.Te();
                o.i(j.re, t(w.N()), w.N());
                !a.ub && Dc(a.ke, s)
            }
            ;
            b.Mb = function(j, h) {
                var b;
                if (i)
                    b = c;
                else {
                    b = f;
                    if (g) {
                        var e = h / g;
                        b = a.Pc(e) * (f - d) + d
                    }
                }
                w.Q(b)
            }
            ;
            b.vb = function(a, e, c, h) {
                d = a;
                f = e;
                g = c;
                w.Q(a);
                b.Q(0);
                b.Bc(c, h)
            }
            ;
            b.ue = function(a) {
                i = e;
                c = a;
                b.Cc(a, h, e)
            }
            ;
            b.we = function(a) {
                c = a
            }
            ;
            w = new Bc;
            w.Lc(n);
            w.Lc(m)
        }
        function oc() {
            var c = this
              , a = Xb();
            b.v(a, 0);
            b.P(a, "pointerEvents", "none");
            c.V = a;
            c.Eb = function() {
                b.J(a);
                b.Ob(a)
            }
        }
        function xc(n, f) {
            var d = this, q, N, v, i, y = [], x, B, W, H, S, F, g, w, p;
            l.call(d, -u, u + 1, {});
            function E(a) {
                q && q.Qc();
                T(n, a, 0);
                F = e;
                q = new I.S(n,I,b.pd(b.g(n, "idle")) || lc,!L);
                q.Q(0)
            }
            function Z() {
                q.cc < I.cc && E()
            }
            function O(p, r, n) {
                if (!H) {
                    H = e;
                    if (i && n) {
                        var g = n.width
                          , c = n.height
                          , m = g
                          , l = c;
                        if (g && c && a.hb) {
                            if (a.hb & 3 && (!(a.hb & 4) || g > K || c > J)) {
                                var h = k
                                  , q = K / J * c / g;
                                if (a.hb & 1)
                                    h = q > 1;
                                else if (a.hb & 2)
                                    h = q < 1;
                                m = h ? g * J / c : K;
                                l = h ? J : c * K / g
                            }
                            b.j(i, m);
                            b.m(i, l);
                            b.F(i, (J - l) / 2);
                            b.G(i, (K - m) / 2)
                        }
                        b.A(i, "absolute");
                        o.i(j.He, f)
                    }
                }
                b.J(r);
                p && p(d)
            }
            function Y(b, c, e, g) {
                if (g == R && s == f && L)
                    if (!Cc) {
                        var a = t(b);
                        A.Me(a, f, c, d, e);
                        c.ye();
                        U.Ub(a - U.Ic() - 1);
                        U.Q(a);
                        z.vb(b, b, 0)
                    }
            }
            function bb(b) {
                if (b == R && s == f) {
                    if (!g) {
                        var a = h;
                        if (A)
                            if (A.Y == f)
                                a = A.xd();
                            else
                                A.Eb();
                        Z();
                        g = new vc(n,f,a,q);
                        g.Tc(p)
                    }
                    !g.vc() && g.bc()
                }
            }
            function G(e, i, l) {
                if (e == f) {
                    if (e != i)
                        C[i] && C[i].Uc();
                    else
                        !l && g && g.ze();
                    p && p.Gb();
                    var m = R = b.O();
                    d.jb(b.D(h, bb, m))
                } else {
                    var k = c.min(f, e)
                      , j = c.max(f, e)
                      , o = c.min(j - k, k + r - j)
                      , n = u + a.ne - 1;
                    (!S || o <= n) && d.jb()
                }
            }
            function db() {
                if (s == f && g) {
                    g.X();
                    p && p.Ee();
                    p && p.Ce();
                    g.cd()
                }
            }
            function eb() {
                s == f && g && g.X()
            }
            function ab(a) {
                !P && o.i(j.te, f, a)
            }
            function Q() {
                p = w.pInstance;
                g && g.Tc(p)
            }
            d.jb = function(c, a) {
                a = a || v;
                if (y.length && !H) {
                    b.L(a);
                    if (!W) {
                        W = e;
                        o.i(j.qe, f);
                        b.f(y, function(a) {
                            if (!b.o(a, "src")) {
                                a.src = b.g(a, "src2") || "";
                                b.H(a, a["display-origin"])
                            }
                        })
                    }
                    b.zd(y, i, b.D(h, O, c, a))
                } else
                    O(c, a)
            }
            ;
            d.me = function() {
                var j = f;
                if (a.Wc < 0)
                    j -= r;
                var e = j + a.Wc * tc;
                if (D & 2)
                    e = t(e);
                if (!(D & 1) && !ib)
                    e = c.max(0, c.min(e, r - u));
                if (e != f) {
                    if (A) {
                        var g = A.Ke(r);
                        if (g) {
                            var k = R = b.O()
                              , i = C[t(e)];
                            return i.jb(b.D(h, Y, e, i, g, k), v)
                        }
                    }
                    cb(e)
                } else if (a.nb) {
                    d.Uc();
                    G(f, f)
                }
            }
            ;
            d.ec = function() {
                G(f, f, e)
            }
            ;
            d.Uc = function() {
                p && p.Ee();
                p && p.Ce();
                d.Sc();
                g && g.Oe();
                g = h;
                E()
            }
            ;
            d.ye = function() {
                b.J(n)
            }
            ;
            d.Sc = function() {
                b.L(n)
            }
            ;
            d.Pe = function() {
                p && p.Gb()
            }
            ;
            function T(a, c, d) {
                if (b.o(a, "jssor-slider"))
                    return;
                if (!F) {
                    if (a.tagName == "IMG") {
                        y.push(a);
                        if (!b.o(a, "src")) {
                            S = e;
                            a["display-origin"] = b.H(a);
                            b.J(a)
                        }
                    }
                    var f = b.ge(a);
                    if (f) {
                        var g = new Image;
                        b.g(g, "src2", f);
                        y.push(g)
                    }
                    if (d) {
                        b.v(a, (b.v(a) || 0) + 1);
                        b.nc(a, b.nc(a) || 0);
                        b.hc(a, b.hc(a) || 0);
                        b.pb(a, {
                            E: 0
                        })
                    }
                }
                var h = b.xb(a);
                b.f(h, function(f) {
                    var h = f.tagName
                      , j = b.g(f, "u");
                    if (j == "player" && !w) {
                        w = f;
                        if (w.pInstance)
                            Q();
                        else
                            b.a(w, "dataavailable", Q)
                    }
                    if (j == "caption") {
                        if (c) {
                            b.Nc(f, b.g(f, "to"));
                            b.Ae(f, b.g(f, "bf"));
                            b.g(f, "3d") && b.Be(f, "preserve-3d")
                        } else if (!b.gd()) {
                            var g = b.ib(f, k, e);
                            b.Ib(g, f, a);
                            b.Fb(f, a);
                            f = g;
                            c = e
                        }
                    } else if (!F && !d && !i) {
                        if (h == "A") {
                            if (b.g(f, "u") == "image")
                                i = b.Re(f, "IMG");
                            else
                                i = b.B(f, "image", e);
                            if (i) {
                                x = f;
                                b.H(x, "block");
                                b.K(x, V);
                                B = b.ib(x, e);
                                b.A(x, "relative");
                                b.ic(B, 0);
                                b.P(B, "backgroundColor", "#000")
                            }
                        } else if (h == "IMG" && b.g(f, "u") == "image")
                            i = f;
                        if (i) {
                            i.border = 0;
                            b.K(i, V)
                        }
                    }
                    T(f, c, d + 1)
                })
            }
            d.Vb = function(c, b) {
                var a = u - b;
                Zb(N, a)
            }
            ;
            d.Y = f;
            m.call(d);
            b.De(n, b.g(n, "p"));
            b.Fe(n, b.g(n, "po"));
            var M = b.B(n, "thumb", e);
            if (M) {
                b.ib(M);
                b.J(M)
            }
            b.L(n);
            v = b.ib(gb);
            b.v(v, 1e3);
            b.a(n, "click", ab);
            E(e);
            d.ie = i;
            d.Oc = B;
            d.Yb = N = n;
            b.R(N, v);
            o.mb(203, G);
            o.mb(28, eb);
            o.mb(24, db)
        }
        function vc(y, f, p, q) {
            var a = this, m = 0, u = 0, g, h, d, c, i, t, r, n = C[f];
            l.call(a, 0, 0);
            function v() {
                b.Ob(N);
                cc && i && n.Oc && b.R(N, n.Oc);
                b.L(N, !i && n.ie)
            }
            function w() {
                a.bc()
            }
            function x(b) {
                r = b;
                a.X();
                a.bc()
            }
            a.bc = function() {
                var b = a.kb();
                if (!B && !O && !r && s == f) {
                    if (!b) {
                        if (g && !i) {
                            i = e;
                            a.cd(e);
                            o.i(j.ae, f, m, u, g, c)
                        }
                        v()
                    }
                    var k, p = j.kd;
                    if (b != c)
                        if (b == d)
                            k = c;
                        else if (b == h)
                            k = d;
                        else if (!b)
                            k = h;
                        else
                            k = a.rc();
                    o.i(p, f, b, m, h, d, c);
                    var l = L && (!E || F);
                    if (b == c)
                        (d != c && !(E & 12) || l) && n.me();
                    else
                        (l || b != c) && a.Bc(k, w)
                }
            }
            ;
            a.ze = function() {
                d == c && d == a.kb() && a.Q(h)
            }
            ;
            a.Oe = function() {
                A && A.Y == f && A.Eb();
                var b = a.kb();
                b < c && o.i(j.kd, f, -b - 1, m, h, d, c)
            }
            ;
            a.cd = function(a) {
                p && b.Hb(lb, a && p.zc.af ? "" : "hidden")
            }
            ;
            a.Vb = function(b, a) {
                if (i && a >= g) {
                    i = k;
                    v();
                    n.Sc();
                    A.Eb();
                    o.i(j.wd, f, m, u, g, c)
                }
                o.i(j.Dd, f, a, m, h, d, c)
            }
            ;
            a.Tc = function(a) {
                if (a && !t) {
                    t = a;
                    a.mb($JssorPlayer$.Hd, x)
                }
            }
            ;
            p && a.dc(p);
            g = a.Xb();
            a.dc(q);
            h = g + q.ed;
            d = g + q.Vc;
            c = a.Xb()
        }
        function Kb(a, c, d) {
            b.G(a, c);
            b.F(a, d)
        }
        function Zb(c, b) {
            var a = x > 0 ? x : fb
              , d = zb * b * (a & 1)
              , e = Ab * b * (a >> 1 & 1);
            Kb(c, d, e)
        }
        function Pb() {
            qb = O;
            Ib = z.rc();
            G = w.N()
        }
        function gc() {
            Pb();
            if (B || !F && E & 12) {
                z.X();
                o.i(j.Ad)
            }
        }
        function ec(f) {
            if (!B && (F || !(E & 12)) && !z.vc()) {
                var d = w.N()
                  , b = c.ceil(G);
                if (f && c.abs(H) >= a.fd) {
                    b = c.ceil(d);
                    b += jb
                }
                if (!(D & 1))
                    b = c.min(r - u, c.max(b, 0));
                var e = c.abs(b - d);
                e = 1 - c.pow(1 - e, 5);
                if (!P && qb)
                    z.Id(Ib);
                else if (d == b) {
                    tb.Pe();
                    tb.ec()
                } else
                    z.vb(d, b, e * Vb)
            }
        }
        function Hb(a) {
            !b.g(b.Zb(a), "nodrag") && b.Db(a)
        }
        function rc(a) {
            Yb(a, 1)
        }
        function Yb(a, c) {
            a = b.wc(a);
            var i = b.Zb(a);
            if (!M && !b.g(i, "nodrag") && sc() && (!c || a.touches.length == 1)) {
                B = e;
                yb = k;
                R = h;
                b.a(g, c ? "touchmove" : "mousemove", Bb);
                b.O();
                P = 0;
                gc();
                if (!qb)
                    x = 0;
                if (c) {
                    var f = a.touches[0];
                    ub = f.clientX;
                    vb = f.clientY
                } else {
                    var d = b.Ac(a);
                    ub = d.x;
                    vb = d.y
                }
                H = 0;
                hb = 0;
                jb = 0;
                o.i(j.yd, t(G), G, a)
            }
        }
        function Bb(d) {
            if (B) {
                d = b.wc(d);
                var f;
                if (d.type != "mousemove") {
                    var l = d.touches[0];
                    f = {
                        x: l.clientX,
                        y: l.clientY
                    }
                } else
                    f = b.Ac(d);
                if (f) {
                    var j = f.x - ub
                      , k = f.y - vb;
                    if (c.floor(G) != G)
                        x = x || fb & M;
                    if ((j || k) && !x) {
                        if (M == 3)
                            if (c.abs(k) > c.abs(j))
                                x = 2;
                            else
                                x = 1;
                        else
                            x = M;
                        if (ob && x == 1 && c.abs(k) - c.abs(j) > 3)
                            yb = e
                    }
                    if (x) {
                        var a = k
                          , i = Ab;
                        if (x == 1) {
                            a = j;
                            i = zb
                        }
                        if (!(D & 1)) {
                            if (a > 0) {
                                var g = i * s
                                  , h = a - g;
                                if (h > 0)
                                    a = g + c.sqrt(h) * 5
                            }
                            if (a < 0) {
                                var g = i * (r - u - s)
                                  , h = -a - g;
                                if (h > 0)
                                    a = -g - c.sqrt(h) * 5
                            }
                        }
                        if (H - hb < -2)
                            jb = 0;
                        else if (H - hb > 2)
                            jb = -1;
                        hb = H;
                        H = a;
                        sb = G - H / i / (Y || 1);
                        if (H && x && !yb) {
                            b.Db(d);
                            if (!O)
                                z.ue(sb);
                            else
                                z.we(sb)
                        }
                    }
                }
            }
        }
        function bb() {
            qc();
            if (B) {
                B = k;
                b.O();
                b.C(g, "mousemove", Bb);
                b.C(g, "touchmove", Bb);
                P = H;
                z.X();
                var a = w.N();
                o.i(j.je, t(a), a, t(G), G);
                E & 12 && Pb();
                ec(e)
            }
        }
        function jc(c) {
            if (P) {
                b.xe(c);
                var a = b.Zb(c);
                while (a && v !== a) {
                    a.tagName == "A" && b.Db(c);
                    try {
                        a = a.parentNode
                    } catch (d) {
                        break
                    }
                }
            }
        }
        function Jb(a) {
            C[s];
            s = t(a);
            tb = C[s];
            Tb(a);
            return s
        }
        function Dc(a, b) {
            x = 0;
            Jb(a);
            o.i(j.td, t(a), b)
        }
        function Tb(a, c) {
            wb = a;
            b.f(S, function(b) {
                b.fc(t(a), a, c)
            })
        }
        function sc() {
            var b = j.ad || 0
              , a = X;
            if (ob)
                a & 1 && (a &= 1);
            j.ad |= a;
            return M = a & ~b
        }
        function qc() {
            if (M) {
                j.ad &= ~X;
                M = 0
            }
        }
        function Xb() {
            var a = b.Bb();
            b.K(a, V);
            b.A(a, "absolute");
            return a
        }
        function t(a) {
            return (a % r + r) % r
        }
        function kc(b, d) {
            if (d)
                if (!D) {
                    b = c.min(c.max(b + wb, 0), r - u);
                    d = k
                } else if (D & 2) {
                    b = t(b + wb);
                    d = k
                }
            cb(b, a.Cb, d)
        }
        function xb() {
            b.f(S, function(a) {
                a.Nb(a.yb.Ze <= F)
            })
        }
        function hc() {
            if (!F) {
                F = 1;
                xb();
                if (!B) {
                    E & 12 && ec();
                    E & 3 && C[s].ec()
                }
            }
        }
        function Ec() {
            if (F) {
                F = 0;
                xb();
                B || !(E & 12) || gc()
            }
        }
        function ic() {
            V = {
                Jb: K,
                Kb: J,
                l: 0,
                k: 0
            };
            b.f(T, function(a) {
                b.K(a, V);
                b.A(a, "absolute");
                b.Hb(a, "hidden");
                b.J(a)
            });
            b.K(gb, V)
        }
        function ab(b, a) {
            cb(b, a, e)
        }
        function cb(g, f, l) {
            if (Rb && (!B && (F || !(E & 12)) || a.bd)) {
                O = e;
                B = k;
                z.X();
                if (f == i)
                    f = Vb;
                var d = Cb.kb()
                  , b = g;
                if (l) {
                    b = d + g;
                    if (g > 0)
                        b = c.ceil(b);
                    else
                        b = c.floor(b)
                }
                if (D & 2)
                    b = t(b);
                if (!(D & 1))
                    b = c.max(0, c.min(b, r - u));
                var j = (b - d) % r;
                b = d + j;
                var h = d == b ? 0 : f * c.abs(j);
                h = c.min(h, f * u * 1.5);
                z.vb(d, b, h || 1)
            }
        }
        o.Cc = function() {
            if (!L) {
                L = e;
                C[s] && C[s].ec()
            }
        }
        ;
        function W() {
            return b.j(y || p)
        }
        function nb() {
            return b.m(y || p)
        }
        o.U = W;
        o.Z = nb;
        function Eb(c, d) {
            if (c == i)
                return b.j(p);
            if (!y) {
                var a = b.Bb(g);
                b.qc(a, b.qc(p));
                b.wb(a, b.wb(p));
                b.H(a, "block");
                b.A(a, "relative");
                b.F(a, 0);
                b.G(a, 0);
                b.Hb(a, "visible");
                y = b.Bb(g);
                b.A(y, "absolute");
                b.F(y, 0);
                b.G(y, 0);
                b.j(y, b.j(p));
                b.m(y, b.m(p));
                b.Nc(y, "0 0");
                b.R(y, a);
                var h = b.xb(p);
                b.R(p, y);
                b.P(p, "backgroundImage", "");
                b.f(h, function(c) {
                    b.R(b.g(c, "noscale") ? p : a, c);
                    b.g(c, "autocenter") && Lb.push(c)
                })
            }
            Y = c / (d ? b.m : b.j)(y);
            b.Je(y, Y);
            var f = d ? Y * W() : c
              , e = d ? c : Y * nb();
            b.j(p, f);
            b.m(p, e);
            b.f(Lb, function(a) {
                var c = b.qd(b.g(a, "autocenter"));
                b.rd(a, c)
            })
        }
        o.fe = Eb;
        m.call(o);
        o.V = p = b.fb(p);
        var a = b.ab({
            hb: 0,
            ne: 1,
            jc: 1,
            kc: 0,
            lc: k,
            nb: 1,
            ob: e,
            bd: e,
            Wc: 1,
            Zc: 3e3,
            Yc: 1,
            Cb: 500,
            Pc: d.Jd,
            fd: 20,
            Xc: 0,
            sb: 1,
            dd: 0,
            Xd: 1,
            oc: 1,
            Rc: 1
        }, fc);
        a.ob = a.ob && b.Ue();
        if (a.Wd != i)
            a.Zc = a.Wd;
        if (a.Ud != i)
            a.dd = a.Ud;
        var fb = a.oc & 3
          , tc = (a.oc & 4) / -4 || 1
          , mb = a.bf
          , I = b.ab({
            S: q,
            ob: a.ob
        }, a.Xe);
        I.ac = I.ac || I.Ve;
        var Fb = a.Rd, Z = a.Qd, eb = a.Ye, Q = !a.Xd, y, v = b.B(p, "slides", Q), gb = b.B(p, "loading", Q) || b.Bb(g), Nb = b.B(p, "navigator", Q), dc = b.B(p, "arrowleft", Q), ac = b.B(p, "arrowright", Q), Mb = b.B(p, "thumbnavigator", Q), pc = b.j(v), nc = b.m(v), V, T = [], uc = b.xb(v);
        b.f(uc, function(a) {
            a.tagName == "DIV" && !b.g(a, "u") && T.push(a);
            b.v(a, (b.v(a) || 0) + 1)
        });
        var s = -1, wb, tb, r = T.length, K = a.Nd || pc, J = a.Md || nc, Wb = a.Xc, zb = K + Wb, Ab = J + Wb, bc = fb & 1 ? zb : Ab, u = c.min(a.sb, r), lb, x, M, yb, S = [], Qb, Sb, Ob, cc, Cc, L, E = a.Yc, lc = a.Zc, Vb = a.Cb, rb, ib, kb, Rb = u < r, D = Rb ? a.nb : 0, X, P, F = 1, O, B, R, ub = 0, vb = 0, H, hb, jb, Cb, w, U, z, Ub = new oc, Y, Lb = [];
        if (r) {
            if (a.ob)
                Kb = function(a, c, d) {
                    b.pb(a, {
                        bb: c,
                        cb: d
                    })
                }
                ;
            L = a.lc;
            o.yb = fc;
            ic();
            b.o(p, "jssor-slider", e);
            b.v(v, b.v(v) || 0);
            b.A(v, "absolute");
            lb = b.ib(v, e);
            b.Ib(lb, v);
            if (mb) {
                cc = mb.We;
                rb = mb.S;
                ib = u == 1 && r > 1 && rb && (!b.gd() || b.sc() >= 8)
            }
            kb = ib || u >= r || !(D & 1) ? 0 : a.dd;
            X = (u > 1 || kb ? fb : -1) & a.Rc;
            var Gb = v, C = [], A, N, Db = b.Ie(), ob = Db.le, G, qb, Ib, sb;
            Db.ld && b.P(Gb, Db.ld, ([h, "pan-y", "pan-x", "none"])[X] || "");
            U = new zc;
            if (ib)
                A = new rb(Ub,K,J,mb,ob);
            b.R(lb, U.Yb);
            b.Hb(v, "hidden");
            N = Xb();
            b.P(N, "backgroundColor", "#000");
            b.ic(N, 0);
            b.Ib(N, Gb.firstChild, Gb);
            for (var db = 0; db < T.length; db++) {
                var wc = T[db]
                  , yc = new xc(wc,db);
                C.push(yc)
            }
            b.J(gb);
            Cb = new Ac;
            z = new mc(Cb,U);
            b.a(v, "click", jc, e);
            b.a(p, "mouseout", b.Sb(hc, p));
            b.a(p, "mouseover", b.Sb(Ec, p));
            if (X) {
                b.a(v, "mousedown", Yb);
                b.a(v, "touchstart", rc);
                b.a(v, "dragstart", Hb);
                b.a(v, "selectstart", Hb);
                b.a(g, "mouseup", bb);
                b.a(g, "touchend", bb);
                b.a(g, "touchcancel", bb);
                b.a(f, "blur", bb)
            }
            E &= ob ? 10 : 5;
            if (Nb && Fb) {
                Qb = new Fb.S(Nb,Fb,W(),nb());
                S.push(Qb)
            }
            if (Z && dc && ac) {
                Z.nb = D;
                Z.sb = u;
                Sb = new Z.S(dc,ac,Z,W(),nb());
                S.push(Sb)
            }
            if (Mb && eb) {
                eb.kc = a.kc;
                Ob = new eb.S(Mb,eb);
                S.push(Ob)
            }
            b.f(S, function(a) {
                a.Rb(r, C, gb);
                a.mb(n.Tb, kc)
            });
            b.P(p, "visibility", "visible");
            Eb(W());
            xb();
            a.jc && b.a(g, "keydown", function(b) {
                if (b.keyCode == 37)
                    ab(-a.jc);
                else
                    b.keyCode == 39 && ab(a.jc)
            });
            var pb = a.kc;
            if (!(D & 1))
                pb = c.max(0, c.min(pb, r - u));
            z.vb(pb, pb, 0)
        }
    };
    j.te = 21;
    j.yd = 22;
    j.je = 23;
    j.pe = 24;
    j.re = 25;
    j.qe = 26;
    j.He = 27;
    j.Ad = 28;
    j.oe = 202;
    j.td = 203;
    j.ae = 206;
    j.wd = 207;
    j.Dd = 208;
    j.kd = 209;
    var n = {
        Tb: 1
    }
      , r = function(d, C) {
        var f = this;
        m.call(f);
        d = b.fb(d);
        var s, A, z, r, l = 0, a, o, j, w, x, i, g, q, p, B = [], y = [];
        function v(a) {
            a != -1 && y[a].he(a == l)
        }
        function t(a) {
            f.i(n.Tb, a * o)
        }
        f.V = d;
        f.fc = function(a) {
            if (a != r) {
                var d = l
                  , b = c.floor(a / o);
                l = b;
                r = a;
                v(d);
                v(b)
            }
        }
        ;
        f.Nb = function(a) {
            b.L(d, a)
        }
        ;
        var u;
        f.Rb = function(D) {
            if (!u) {
                s = c.ceil(D / o);
                l = 0;
                var n = q + w
                  , r = p + x
                  , m = c.ceil(s / j) - 1;
                A = q + n * (!i ? m : j - 1);
                z = p + r * (i ? m : j - 1);
                b.j(d, A);
                b.m(d, z);
                for (var f = 0; f < s; f++) {
                    var C = b.Se();
                    b.se(C, f + 1);
                    var k = b.Ed(g, "numbertemplate", C, e);
                    b.A(k, "absolute");
                    var v = f % (m + 1);
                    b.G(k, !i ? n * v : f % j * n);
                    b.F(k, i ? r * v : c.floor(f / (m + 1)) * r);
                    b.R(d, k);
                    B[f] = k;
                    a.Wb & 1 && b.a(k, "click", b.D(h, t, f));
                    a.Wb & 2 && b.a(k, "mouseover", b.Sb(b.D(h, t, f), k));
                    y[f] = b.gc(k)
                }
                u = e
            }
        }
        ;
        f.yb = a = b.ab({
            md: 10,
            jd: 10,
            id: 1,
            Wb: 1
        }, C);
        g = b.B(d, "prototype");
        q = b.j(g);
        p = b.m(g);
        b.Fb(g, d);
        o = a.hd || 1;
        j = a.Bd || 1;
        w = a.md;
        x = a.jd;
        i = a.id - 1;
        a.mc == k && b.o(d, "noscale", e);
        a.gb && b.o(d, "autocenter", a.gb)
    }
      , s = function(a, g, i) {
        var c = this;
        m.call(c);
        var r, d, f, j;
        b.j(a);
        b.m(a);
        var p, o;
        function l(a) {
            c.i(n.Tb, a, e)
        }
        function t(c) {
            b.L(a, c);
            b.L(g, c)
        }
        function s() {
            p.Gb(i.nb || d > 0);
            o.Gb(i.nb || d < r - i.sb)
        }
        c.fc = function(b, a, c) {
            if (c)
                d = a;
            else {
                d = b;
                s()
            }
        }
        ;
        c.Nb = t;
        var q;
        c.Rb = function(c) {
            r = c;
            d = 0;
            if (!q) {
                b.a(a, "click", b.D(h, l, -j));
                b.a(g, "click", b.D(h, l, j));
                p = b.gc(a);
                o = b.gc(g);
                q = e
            }
        }
        ;
        c.yb = f = b.ab({
            hd: 1
        }, i);
        j = f.hd;
        if (f.mc == k) {
            b.o(a, "noscale", e);
            b.o(g, "noscale", e)
        }
        if (f.gb) {
            b.o(a, "autocenter", f.gb);
            b.o(g, "autocenter", f.gb)
        }
    };
    function q(e, d, c) {
        var a = this;
        l.call(a, 0, c);
        a.Qc = b.Kc;
        a.ed = 0;
        a.Vc = c
    }
    jssor_1_slider_init = function() {
        var h = {
            lc: e,
            Cb: 800,
            Pc: d.Od,
            Qd: {
                S: s
            },
            Rd: {
                S: r
            }
        }
          , g = new j("jssor_1",h);
        function a() {
            var b = g.V.parentNode.clientWidth;
            if (b) {
                b = c.min(b, 1920);
                g.fe(b)
            } else
                f.setTimeout(a, 30)
        }
        a();
        b.a(f, "load", a);
        b.a(f, "resize", a);
        b.a(f, "orientationchange", a)
    }
}
)(window, document, Math, null, true, false)
