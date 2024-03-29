/*!
 SearchPanes 1.2.1
 2019-2020 SpryMedia Ltd - datatables.net/license
*/
var $jscomp = $jscomp || {};
$jscomp.scope = {};
$jscomp.getGlobal = function (m) {
    m = ["object" == typeof globalThis && globalThis, m, "object" == typeof window && window, "object" == typeof self && self, "object" == typeof global && global];
    for (var t = 0; t < m.length; ++t) {
        var g = m[t];
        if (g && g.Math == Math) return g;
    }
    throw Error("Cannot find global object");
};
$jscomp.global = $jscomp.getGlobal(this);
$jscomp.checkEs6ConformanceViaProxy = function () {
    try {
        var m = {},
            t = Object.create(
                new $jscomp.global.Proxy(m, {
                    get: function (g, r, u) {
                        return g == m && "q" == r && u == t;
                    },
                })
            );
        return !0 === t.q;
    } catch (g) {
        return !1;
    }
};
$jscomp.USE_PROXY_FOR_ES6_CONFORMANCE_CHECKS = !1;
$jscomp.ES6_CONFORMANCE = $jscomp.USE_PROXY_FOR_ES6_CONFORMANCE_CHECKS && $jscomp.checkEs6ConformanceViaProxy();
$jscomp.arrayIteratorImpl = function (m) {
    var t = 0;
    return function () {
        return t < m.length ? { done: !1, value: m[t++] } : { done: !0 };
    };
};
$jscomp.arrayIterator = function (m) {
    return { next: $jscomp.arrayIteratorImpl(m) };
};
$jscomp.ASSUME_ES5 = !1;
$jscomp.ASSUME_NO_NATIVE_MAP = !1;
$jscomp.ASSUME_NO_NATIVE_SET = !1;
$jscomp.SIMPLE_FROUND_POLYFILL = !1;
$jscomp.ISOLATE_POLYFILLS = !1;
$jscomp.defineProperty =
    $jscomp.ASSUME_ES5 || "function" == typeof Object.defineProperties
        ? Object.defineProperty
        : function (m, t, g) {
              if (m == Array.prototype || m == Object.prototype) return m;
              m[t] = g.value;
              return m;
          };
$jscomp.IS_SYMBOL_NATIVE = "function" === typeof Symbol && "symbol" === typeof Symbol("x");
$jscomp.TRUST_ES6_POLYFILLS = !$jscomp.ISOLATE_POLYFILLS || $jscomp.IS_SYMBOL_NATIVE;
$jscomp.polyfills = {};
$jscomp.propertyToPolyfillSymbol = {};
$jscomp.POLYFILL_PREFIX = "$jscp$";
var $jscomp$lookupPolyfilledValue = function (m, t) {
    var g = $jscomp.propertyToPolyfillSymbol[t];
    if (null == g) return m[t];
    g = m[g];
    return void 0 !== g ? g : m[t];
};
$jscomp.polyfill = function (m, t, g, r) {
    t && ($jscomp.ISOLATE_POLYFILLS ? $jscomp.polyfillIsolated(m, t, g, r) : $jscomp.polyfillUnisolated(m, t, g, r));
};
$jscomp.polyfillUnisolated = function (m, t, g, r) {
    g = $jscomp.global;
    m = m.split(".");
    for (r = 0; r < m.length - 1; r++) {
        var u = m[r];
        if (!(u in g)) return;
        g = g[u];
    }
    m = m[m.length - 1];
    r = g[m];
    t = t(r);
    t != r && null != t && $jscomp.defineProperty(g, m, { configurable: !0, writable: !0, value: t });
};
$jscomp.polyfillIsolated = function (m, t, g, r) {
    var u = m.split(".");
    m = 1 === u.length;
    r = u[0];
    r = !m && r in $jscomp.polyfills ? $jscomp.polyfills : $jscomp.global;
    for (var q = 0; q < u.length - 1; q++) {
        var y = u[q];
        if (!(y in r)) return;
        r = r[y];
    }
    u = u[u.length - 1];
    g = $jscomp.IS_SYMBOL_NATIVE && "es6" === g ? r[u] : null;
    t = t(g);
    null != t &&
        (m
            ? $jscomp.defineProperty($jscomp.polyfills, u, { configurable: !0, writable: !0, value: t })
            : t !== g &&
              (($jscomp.propertyToPolyfillSymbol[u] = $jscomp.IS_SYMBOL_NATIVE ? $jscomp.global.Symbol(u) : $jscomp.POLYFILL_PREFIX + u),
              (u = $jscomp.propertyToPolyfillSymbol[u]),
              $jscomp.defineProperty(r, u, { configurable: !0, writable: !0, value: t })));
};
$jscomp.initSymbol = function () {};
$jscomp.polyfill(
    "Symbol",
    function (m) {
        if (m) return m;
        var t = function (u, q) {
            this.$jscomp$symbol$id_ = u;
            $jscomp.defineProperty(this, "description", { configurable: !0, writable: !0, value: q });
        };
        t.prototype.toString = function () {
            return this.$jscomp$symbol$id_;
        };
        var g = 0,
            r = function (u) {
                if (this instanceof r) throw new TypeError("Symbol is not a constructor");
                return new t("jscomp_symbol_" + (u || "") + "_" + g++, u);
            };
        return r;
    },
    "es6",
    "es3"
);
$jscomp.initSymbolIterator = function () {};
$jscomp.polyfill(
    "Symbol.iterator",
    function (m) {
        if (m) return m;
        m = Symbol("Symbol.iterator");
        for (var t = "Array Int8Array Uint8Array Uint8ClampedArray Int16Array Uint16Array Int32Array Uint32Array Float32Array Float64Array".split(" "), g = 0; g < t.length; g++) {
            var r = $jscomp.global[t[g]];
            "function" === typeof r &&
                "function" != typeof r.prototype[m] &&
                $jscomp.defineProperty(r.prototype, m, {
                    configurable: !0,
                    writable: !0,
                    value: function () {
                        return $jscomp.iteratorPrototype($jscomp.arrayIteratorImpl(this));
                    },
                });
        }
        return m;
    },
    "es6",
    "es3"
);
$jscomp.initSymbolAsyncIterator = function () {};
$jscomp.iteratorPrototype = function (m) {
    m = { next: m };
    m[Symbol.iterator] = function () {
        return this;
    };
    return m;
};
$jscomp.makeIterator = function (m) {
    var t = "undefined" != typeof Symbol && Symbol.iterator && m[Symbol.iterator];
    return t ? t.call(m) : $jscomp.arrayIterator(m);
};
$jscomp.owns = function (m, t) {
    return Object.prototype.hasOwnProperty.call(m, t);
};
$jscomp.polyfill(
    "WeakMap",
    function (m) {
        function t() {
            if (!m || !Object.seal) return !1;
            try {
                var a = Object.seal({}),
                    b = Object.seal({}),
                    c = new m([
                        [a, 2],
                        [b, 3],
                    ]);
                if (2 != c.get(a) || 3 != c.get(b)) return !1;
                c.delete(a);
                c.set(b, 4);
                return !c.has(a) && 4 == c.get(b);
            } catch (d) {
                return !1;
            }
        }
        function g() {}
        function r(a) {
            var b = typeof a;
            return ("object" === b && null !== a) || "function" === b;
        }
        function u(a) {
            if (!$jscomp.owns(a, y)) {
                var b = new g();
                $jscomp.defineProperty(a, y, { value: b });
            }
        }
        function q(a) {
            if (!$jscomp.ISOLATE_POLYFILLS) {
                var b = Object[a];
                b &&
                    (Object[a] = function (c) {
                        if (c instanceof g) return c;
                        Object.isExtensible(c) && u(c);
                        return b(c);
                    });
            }
        }
        if ($jscomp.USE_PROXY_FOR_ES6_CONFORMANCE_CHECKS) {
            if (m && $jscomp.ES6_CONFORMANCE) return m;
        } else if (t()) return m;
        var y = "$jscomp_hidden_" + Math.random();
        q("freeze");
        q("preventExtensions");
        q("seal");
        var G = 0,
            h = function (a) {
                this.id_ = (G += Math.random() + 1).toString();
                if (a) {
                    a = $jscomp.makeIterator(a);
                    for (var b; !(b = a.next()).done; ) (b = b.value), this.set(b[0], b[1]);
                }
            };
        h.prototype.set = function (a, b) {
            if (!r(a)) throw Error("Invalid WeakMap key");
            u(a);
            if (!$jscomp.owns(a, y)) throw Error("WeakMap key fail: " + a);
            a[y][this.id_] = b;
            return this;
        };
        h.prototype.get = function (a) {
            return r(a) && $jscomp.owns(a, y) ? a[y][this.id_] : void 0;
        };
        h.prototype.has = function (a) {
            return r(a) && $jscomp.owns(a, y) && $jscomp.owns(a[y], this.id_);
        };
        h.prototype.delete = function (a) {
            return r(a) && $jscomp.owns(a, y) && $jscomp.owns(a[y], this.id_) ? delete a[y][this.id_] : !1;
        };
        return h;
    },
    "es6",
    "es3"
);
$jscomp.MapEntry = function () {};
$jscomp.polyfill(
    "Map",
    function (m) {
        function t() {
            if ($jscomp.ASSUME_NO_NATIVE_MAP || !m || "function" != typeof m || !m.prototype.entries || "function" != typeof Object.seal) return !1;
            try {
                var h = Object.seal({ x: 4 }),
                    a = new m($jscomp.makeIterator([[h, "s"]]));
                if ("s" != a.get(h) || 1 != a.size || a.get({ x: 4 }) || a.set({ x: 4 }, "t") != a || 2 != a.size) return !1;
                var b = a.entries(),
                    c = b.next();
                if (c.done || c.value[0] != h || "s" != c.value[1]) return !1;
                c = b.next();
                return c.done || 4 != c.value[0].x || "t" != c.value[1] || !b.next().done ? !1 : !0;
            } catch (d) {
                return !1;
            }
        }
        if ($jscomp.USE_PROXY_FOR_ES6_CONFORMANCE_CHECKS) {
            if (m && $jscomp.ES6_CONFORMANCE) return m;
        } else if (t()) return m;
        var g = new WeakMap(),
            r = function (h) {
                this.data_ = {};
                this.head_ = y();
                this.size = 0;
                if (h) {
                    h = $jscomp.makeIterator(h);
                    for (var a; !(a = h.next()).done; ) (a = a.value), this.set(a[0], a[1]);
                }
            };
        r.prototype.set = function (h, a) {
            h = 0 === h ? 0 : h;
            var b = u(this, h);
            b.list || (b.list = this.data_[b.id] = []);
            b.entry
                ? (b.entry.value = a)
                : ((b.entry = { next: this.head_, previous: this.head_.previous, head: this.head_, key: h, value: a }), b.list.push(b.entry), (this.head_.previous.next = b.entry), (this.head_.previous = b.entry), this.size++);
            return this;
        };
        r.prototype.delete = function (h) {
            h = u(this, h);
            return h.entry && h.list ? (h.list.splice(h.index, 1), h.list.length || delete this.data_[h.id], (h.entry.previous.next = h.entry.next), (h.entry.next.previous = h.entry.previous), (h.entry.head = null), this.size--, !0) : !1;
        };
        r.prototype.clear = function () {
            this.data_ = {};
            this.head_ = this.head_.previous = y();
            this.size = 0;
        };
        r.prototype.has = function (h) {
            return !!u(this, h).entry;
        };
        r.prototype.get = function (h) {
            return (h = u(this, h).entry) && h.value;
        };
        r.prototype.entries = function () {
            return q(this, function (h) {
                return [h.key, h.value];
            });
        };
        r.prototype.keys = function () {
            return q(this, function (h) {
                return h.key;
            });
        };
        r.prototype.values = function () {
            return q(this, function (h) {
                return h.value;
            });
        };
        r.prototype.forEach = function (h, a) {
            for (var b = this.entries(), c; !(c = b.next()).done; ) (c = c.value), h.call(a, c[1], c[0], this);
        };
        r.prototype[Symbol.iterator] = r.prototype.entries;
        var u = function (h, a) {
                var b = a && typeof a;
                "object" == b || "function" == b ? (g.has(a) ? (b = g.get(a)) : ((b = "" + ++G), g.set(a, b))) : (b = "p_" + a);
                var c = h.data_[b];
                if (c && $jscomp.owns(h.data_, b))
                    for (h = 0; h < c.length; h++) {
                        var d = c[h];
                        if ((a !== a && d.key !== d.key) || a === d.key) return { id: b, list: c, index: h, entry: d };
                    }
                return { id: b, list: c, index: -1, entry: void 0 };
            },
            q = function (h, a) {
                var b = h.head_;
                return $jscomp.iteratorPrototype(function () {
                    if (b) {
                        for (; b.head != h.head_; ) b = b.previous;
                        for (; b.next != b.head; ) return (b = b.next), { done: !1, value: a(b) };
                        b = null;
                    }
                    return { done: !0, value: void 0 };
                });
            },
            y = function () {
                var h = {};
                return (h.previous = h.next = h.head = h);
            },
            G = 0;
        return r;
    },
    "es6",
    "es3"
);
$jscomp.findInternal = function (m, t, g) {
    m instanceof String && (m = String(m));
    for (var r = m.length, u = 0; u < r; u++) {
        var q = m[u];
        if (t.call(g, q, u, m)) return { i: u, v: q };
    }
    return { i: -1, v: void 0 };
};
$jscomp.polyfill(
    "Array.prototype.find",
    function (m) {
        return m
            ? m
            : function (t, g) {
                  return $jscomp.findInternal(this, t, g).v;
              };
    },
    "es6",
    "es3"
);
$jscomp.iteratorFromArray = function (m, t) {
    m instanceof String && (m += "");
    var g = 0,
        r = {
            next: function () {
                if (g < m.length) {
                    var u = g++;
                    return { value: t(u, m[u]), done: !1 };
                }
                r.next = function () {
                    return { done: !0, value: void 0 };
                };
                return r.next();
            },
        };
    r[Symbol.iterator] = function () {
        return r;
    };
    return r;
};
$jscomp.polyfill(
    "Array.prototype.keys",
    function (m) {
        return m
            ? m
            : function () {
                  return $jscomp.iteratorFromArray(this, function (t) {
                      return t;
                  });
              };
    },
    "es6",
    "es3"
);
$jscomp.polyfill(
    "Array.prototype.findIndex",
    function (m) {
        return m
            ? m
            : function (t, g) {
                  return $jscomp.findInternal(this, t, g).i;
              };
    },
    "es6",
    "es3"
);
(function () {
    function m(h) {
        g = h;
        r = h.fn.dataTable;
    }
    function t(h) {
        q = h;
        y = h.fn.dataTable;
    }
    var g,
        r,
        u = (function () {
            function h(a, b, c, d, e, k) {
                var f = this;
                void 0 === k && (k = null);
                if (!r || !r.versionCheck || !r.versionCheck("1.10.0")) throw Error("SearchPane requires DataTables 1.10 or newer");
                if (!r.select) throw Error("SearchPane requires Select");
                a = new r.Api(a);
                this.classes = g.extend(!0, {}, h.classes);
                this.c = g.extend(!0, {}, h.defaults, b);
                this.customPaneSettings = k;
                this.s = {
                    cascadeRegen: !1,
                    clearing: !1,
                    colOpts: [],
                    deselect: !1,
                    displayed: !1,
                    dt: a,
                    dtPane: void 0,
                    filteringActive: !1,
                    index: c,
                    indexes: [],
                    lastCascade: !1,
                    lastSelect: !1,
                    listSet: !1,
                    name: void 0,
                    redraw: !1,
                    rowData: { arrayFilter: [], arrayOriginal: [], arrayTotals: [], bins: {}, binsOriginal: {}, binsTotal: {}, filterMap: new Map(), totalOptions: 0 },
                    scrollTop: 0,
                    searchFunction: void 0,
                    selectPresent: !1,
                    serverSelect: [],
                    serverSelecting: !1,
                    showFiltered: !1,
                    tableLength: null,
                    updating: !1,
                };
                b = a.columns().eq(0).toArray().length;
                this.colExists = this.s.index < b;
                this.c.layout = d;
                b = parseInt(d.split("-")[1], 10);
                this.dom = {
                    buttonGroup: g("<div/>").addClass(this.classes.buttonGroup),
                    clear: g('<button type="button">&#215;</button>').addClass(this.classes.dull).addClass(this.classes.paneButton).addClass(this.classes.clearButton),
                    container: g("<div/>")
                        .addClass(this.classes.container)
                        .addClass(this.classes.layout + (10 > b ? d : d.split("-")[0] + "-9")),
                    countButton: g('<button type="button"></button>').addClass(this.classes.paneButton).addClass(this.classes.countButton),
                    dtP: g("<table><thead><tr><th>" + (this.colExists ? g(a.column(this.colExists ? this.s.index : 0).header()).text() : this.customPaneSettings.header || "Custom Pane") + "</th><th/></tr></thead></table>"),
                    lower: g("<div/>").addClass(this.classes.subRow2).addClass(this.classes.narrowButton),
                    nameButton: g('<button type="button"></button>').addClass(this.classes.paneButton).addClass(this.classes.nameButton),
                    panesContainer: e,
                    searchBox: g("<input/>").addClass(this.classes.paneInputButton).addClass(this.classes.search),
                    searchButton: g('<button type = "button" class="' + this.classes.searchIcon + '"></button>').addClass(this.classes.paneButton),
                    searchCont: g("<div/>").addClass(this.classes.searchCont),
                    searchLabelCont: g("<div/>").addClass(this.classes.searchLabelCont),
                    topRow: g("<div/>").addClass(this.classes.topRow),
                    upper: g("<div/>").addClass(this.classes.subRow1).addClass(this.classes.narrowSearch),
                };
                this.s.displayed = !1;
                a = this.s.dt;
                this.selections = [];
                this.s.colOpts = this.colExists ? this._getOptions() : this._getBonusOptions();
                var l = this.s.colOpts;
                d = g('<button type="button">X</button>').addClass(this.classes.paneButton);
                g(d).text(a.i18n("searchPanes.clearPane", "X"));
                this.dom.container.addClass(l.className);
                this.dom.container.addClass(null !== this.customPaneSettings && void 0 !== this.customPaneSettings.className ? this.customPaneSettings.className : "");
                this.s.name =
                    void 0 !== this.s.colOpts.name
                        ? this.s.colOpts.name
                        : null !== this.customPaneSettings && void 0 !== this.customPaneSettings.name
                        ? this.customPaneSettings.name
                        : this.colExists
                        ? g(a.column(this.s.index).header()).text()
                        : this.customPaneSettings.header || "Custom Pane";
                g(e).append(this.dom.container);
                var p = a.table(0).node();
                this.s.searchFunction = function (n, w, z, x) {
                    if (0 === f.selections.length || n.nTable !== p) return !0;
                    n = null;
                    f.colExists && ((n = w[f.s.index]), "filter" !== l.orthogonal.filter && ((n = f.s.rowData.filterMap.get(z)), n instanceof g.fn.dataTable.Api && (n = n.toArray())));
                    return f._search(n, z);
                };
                g.fn.dataTable.ext.search.push(this.s.searchFunction);
                if (this.c.clear)
                    g(d).on("click", function () {
                        f.dom.container.find(f.classes.search).each(function () {
                            g(this).val("");
                            g(this).trigger("input");
                        });
                        f.clearPane();
                    });
                a.on("draw.dtsp", function () {
                    f._adjustTopRow();
                });
                a.on("buttons-action", function () {
                    f._adjustTopRow();
                });
                g(window).on(
                    "resize.dtsp",
                    r.util.throttle(function () {
                        f._adjustTopRow();
                    })
                );
                a.on("column-reorder.dtsp", function (n, w, z) {
                    f.s.index = z.mapping[f.s.index];
                });
                return this;
            }
            h.prototype.clearData = function () {
                this.s.rowData = { arrayFilter: [], arrayOriginal: [], arrayTotals: [], bins: {}, binsOriginal: {}, binsTotal: {}, filterMap: new Map(), totalOptions: 0 };
            };
            h.prototype.clearPane = function () {
                this.s.dtPane.rows({ selected: !0 }).deselect();
                this.updateTable();
                return this;
            };
            h.prototype.destroy = function () {
                g(this.s.dtPane).off(".dtsp");
                g(this.s.dt).off(".dtsp");
                g(this.dom.nameButton).off(".dtsp");
                g(this.dom.countButton).off(".dtsp");
                g(this.dom.clear).off(".dtsp");
                g(this.dom.searchButton).off(".dtsp");
                g(this.dom.container).remove();
                for (var a = g.fn.dataTable.ext.search.indexOf(this.s.searchFunction); -1 !== a; ) g.fn.dataTable.ext.search.splice(a, 1), (a = g.fn.dataTable.ext.search.indexOf(this.s.searchFunction));
                void 0 !== this.s.dtPane && this.s.dtPane.destroy();
                this.s.listSet = !1;
            };
            h.prototype.getPaneCount = function () {
                return void 0 !== this.s.dtPane ? this.s.dtPane.rows({ selected: !0 }).data().toArray().length : 0;
            };
            h.prototype.rebuildPane = function (a, b, c, d) {
                void 0 === a && (a = !1);
                void 0 === b && (b = null);
                void 0 === c && (c = null);
                void 0 === d && (d = !1);
                this.clearData();
                var e = [];
                this.s.serverSelect = [];
                var k = null;
                void 0 !== this.s.dtPane &&
                    (d && (this.s.dt.page.info().serverSide ? (this.s.serverSelect = this.s.dtPane.rows({ selected: !0 }).data().toArray()) : (e = this.s.dtPane.rows({ selected: !0 }).data().toArray())),
                    this.s.dtPane.clear().destroy(),
                    (k = g(this.dom.container).prev()),
                    this.destroy(),
                    (this.s.dtPane = void 0),
                    g.fn.dataTable.ext.search.push(this.s.searchFunction));
                this.dom.container.removeClass(this.classes.hidden);
                this.s.displayed = !1;
                this._buildPane(this.s.dt.page.info().serverSide ? this.s.serverSelect : e, a, b, c, k);
                return this;
            };
            h.prototype.removePane = function () {
                this.s.displayed = !1;
                g(this.dom.container).hide();
            };
            h.prototype.setCascadeRegen = function (a) {
                this.s.cascadeRegen = a;
            };
            h.prototype.setClear = function (a) {
                this.s.clearing = a;
            };
            h.prototype.updatePane = function (a) {
                void 0 === a && (a = !1);
                this.s.updating = !0;
                this._updateCommon(a);
                this.s.updating = !1;
            };
            h.prototype.updateTable = function () {
                this.selections = this.s.dtPane.rows({ selected: !0 }).data().toArray();
                this._searchExtras();
                (this.c.cascadePanes || this.c.viewTotal) && this.updatePane();
            };
            h.prototype._setListeners = function () {
                var a = this,
                    b = this.s.rowData,
                    c;
                this.s.dtPane.on("select.dtsp", function () {
                    clearTimeout(c);
                    a.s.dt.page.info().serverSide && !a.s.updating
                        ? a.s.serverSelecting || ((a.s.serverSelect = a.s.dtPane.rows({ selected: !0 }).data().toArray()), (a.s.scrollTop = g(a.s.dtPane.table().node()).parent()[0].scrollTop), (a.s.selectPresent = !0), a.s.dt.draw(!1))
                        : (g(a.dom.clear).removeClass(a.classes.dull), (a.s.selectPresent = !0), a.s.updating || a._makeSelection(), (a.s.selectPresent = !1));
                });
                this.s.dtPane.on("deselect.dtsp", function () {
                    c = setTimeout(function () {
                        a.s.dt.page.info().serverSide && !a.s.updating
                            ? a.s.serverSelecting || ((a.s.serverSelect = a.s.dtPane.rows({ selected: !0 }).data().toArray()), (a.s.deselect = !0), a.s.dt.draw(!1))
                            : ((a.s.deselect = !0), 0 === a.s.dtPane.rows({ selected: !0 }).data().toArray().length && g(a.dom.clear).addClass(a.classes.dull), a._makeSelection(), (a.s.deselect = !1), a.s.dt.state.save());
                    }, 50);
                });
                this.s.dt.on("stateSaveParams.dtsp", function (d, e, k) {
                    if (g.isEmptyObject(k)) a.s.dtPane.state.clear();
                    else {
                        d = [];
                        if (void 0 !== a.s.dtPane) {
                            d = a.s.dtPane
                                .rows({ selected: !0 })
                                .data()
                                .map(function (w) {
                                    return w.filter.toString();
                                })
                                .toArray();
                            var f = g(a.dom.searchBox).val();
                            var l = a.s.dtPane.order();
                            var p = b.binsOriginal;
                            var n = b.arrayOriginal;
                        }
                        void 0 === k.searchPanes && (k.searchPanes = {});
                        void 0 === k.searchPanes.panes && (k.searchPanes.panes = []);
                        k.searchPanes.panes.push({ arrayFilter: n, bins: p, id: a.s.index, order: l, searchTerm: f, selected: d });
                    }
                });
                this.s.dtPane.on("user-select.dtsp", function (d, e, k, f, l) {
                    l.stopPropagation();
                });
                this.s.dtPane.on("draw.dtsp", function () {
                    a._adjustTopRow();
                });
                g(this.dom.nameButton).on("click.dtsp", function () {
                    var d = a.s.dtPane.order()[0][1];
                    a.s.dtPane.order([0, "asc" === d ? "desc" : "asc"]).draw();
                    a.s.dt.state.save();
                });
                g(this.dom.countButton).on("click.dtsp", function () {
                    var d = a.s.dtPane.order()[0][1];
                    a.s.dtPane.order([1, "asc" === d ? "desc" : "asc"]).draw();
                    a.s.dt.state.save();
                });
                g(this.dom.clear).on("click.dtsp", function () {
                    a.dom.container.find("." + a.classes.search).each(function () {
                        g(this).val("");
                        g(this).trigger("input");
                    });
                    a.clearPane();
                });
                g(this.dom.searchButton).on("click.dtsp", function () {
                    g(a.dom.searchBox).focus();
                });
                g(this.dom.searchBox).on("input.dtsp", function () {
                    a.s.dtPane.search(g(a.dom.searchBox).val()).draw();
                    a.s.dt.state.save();
                });
                this.s.dt.state.save();
                return !0;
            };
            h.prototype._addOption = function (a, b, c, d, e, k) {
                if (Array.isArray(a) || a instanceof r.Api)
                    if ((a instanceof r.Api && ((a = a.toArray()), (b = b.toArray())), a.length === b.length))
                        for (var f = 0; f < a.length; f++) k[a[f]] ? k[a[f]]++ : ((k[a[f]] = 1), e.push({ display: b[f], filter: a[f], sort: c[f], type: d[f] })), this.s.rowData.totalOptions++;
                    else throw Error("display and filter not the same length");
                else "string" === typeof this.s.colOpts.orthogonal ? (k[a] ? k[a]++ : ((k[a] = 1), e.push({ display: b, filter: a, sort: c, type: d })), this.s.rowData.totalOptions++) : e.push({ display: b, filter: a, sort: c, type: d });
            };
            h.prototype._addRow = function (a, b, c, d, e, k, f) {
                for (var l, p = 0, n = this.s.indexes; p < n.length; p++) {
                    var w = n[p];
                    w.filter === b && (l = w.index);
                }
                void 0 === l && ((l = this.s.indexes.length), this.s.indexes.push({ filter: b, index: l }));
                return this.s.dtPane.row.add({
                    className: f,
                    display: "" !== a ? a : !1 !== this.s.colOpts.emptyMessage ? this.s.colOpts.emptyMessage : this.c.emptyMessage,
                    filter: b,
                    index: l,
                    shown: c,
                    sort: "" !== e ? e : !1 !== this.s.colOpts.emptyMessage ? this.s.colOpts.emptyMessage : this.c.emptyMessage,
                    total: d,
                    type: k,
                });
            };
            h.prototype._adjustTopRow = function () {
                var a = this.dom.container.find("." + this.classes.subRowsContainer),
                    b = this.dom.container.find(".dtsp-subRow1"),
                    c = this.dom.container.find(".dtsp-subRow2"),
                    d = this.dom.container.find("." + this.classes.topRow);
                (252 > g(a[0]).width() || 252 > g(d[0]).width()) && 0 !== g(a[0]).width()
                    ? (g(a[0]).addClass(this.classes.narrow), g(b[0]).addClass(this.classes.narrowSub).removeClass(this.classes.narrowSearch), g(c[0]).addClass(this.classes.narrowSub).removeClass(this.classes.narrowButton))
                    : (g(a[0]).removeClass(this.classes.narrow), g(b[0]).removeClass(this.classes.narrowSub).addClass(this.classes.narrowSearch), g(c[0]).removeClass(this.classes.narrowSub).addClass(this.classes.narrowButton));
            };
            h.prototype._buildPane = function (a, b, c, d, e) {
                var k = this;
                void 0 === a && (a = []);
                void 0 === b && (b = !1);
                void 0 === c && (c = null);
                void 0 === d && (d = null);
                void 0 === e && (e = null);
                this.selections = [];
                var f = this.s.dt,
                    l = f.column(this.colExists ? this.s.index : 0),
                    p = this.s.colOpts,
                    n = this.s.rowData,
                    w = f.i18n("searchPanes.count", "{total}"),
                    z = f.i18n("searchPanes.countFiltered", "{shown} ({total})"),
                    x = f.state.loaded();
                this.s.listSet && (x = f.state());
                if (this.colExists) {
                    var A = -1;
                    if (x && x.searchPanes && x.searchPanes.panes)
                        for (var v = 0; v < x.searchPanes.panes.length; v++)
                            if (x.searchPanes.panes[v].id === this.s.index) {
                                A = v;
                                break;
                            }
                    if ((!1 === p.show || (void 0 !== p.show && !0 !== p.show)) && -1 === A) return this.dom.container.addClass(this.classes.hidden), (this.s.displayed = !1);
                    if (!0 === p.show || -1 !== A) this.s.displayed = !0;
                    if (!this.s.dt.page.info().serverSide && null === c) {
                        if (0 === n.arrayFilter.length)
                            if ((this._populatePane(b), (this.s.rowData.totalOptions = 0), this._detailsPane(), x && x.searchPanes && x.searchPanes.panes))
                                if (-1 !== A) (n.binsOriginal = x.searchPanes.panes[A].bins), (n.arrayOriginal = x.searchPanes.panes[A].arrayFilter);
                                else {
                                    this.dom.container.addClass(this.classes.hidden);
                                    this.s.displayed = !1;
                                    return;
                                }
                            else (n.arrayOriginal = n.arrayTotals), (n.binsOriginal = n.binsTotal);
                        v = Object.keys(n.binsOriginal).length;
                        c = this._uniqueRatio(v, f.rows()[0].length);
                        if (!1 === this.s.displayed && ((void 0 === p.show && null === p.threshold ? c > this.c.threshold : c > p.threshold) || (!0 !== p.show && 1 >= v))) {
                            this.dom.container.addClass(this.classes.hidden);
                            this.s.displayed = !1;
                            return;
                        }
                        this.c.viewTotal && 0 === n.arrayTotals.length ? ((this.s.rowData.totalOptions = 0), this._detailsPane()) : (n.binsTotal = n.bins);
                        this.dom.container.addClass(this.classes.show);
                        this.s.displayed = !0;
                    } else if (null !== c) {
                        if (void 0 !== c.tableLength) (this.s.tableLength = c.tableLength), (this.s.rowData.totalOptions = this.s.tableLength);
                        else if (null === this.s.tableLength || f.rows()[0].length > this.s.tableLength) (this.s.tableLength = f.rows()[0].length), (this.s.rowData.totalOptions = this.s.tableLength);
                        b = f.column(this.s.index).dataSrc();
                        if (void 0 !== c[b])
                            for (v = 0, c = c[b]; v < c.length; v++)
                                (b = c[v]),
                                    this.s.rowData.arrayFilter.push({ display: b.label, filter: b.value, sort: b.label, type: b.label }),
                                    (this.s.rowData.bins[b.value] = this.c.viewTotal || this.c.cascadePanes ? b.count : b.total),
                                    (this.s.rowData.binsTotal[b.value] = b.total);
                        v = Object.keys(n.binsTotal).length;
                        c = this._uniqueRatio(v, this.s.tableLength);
                        if (!1 === this.s.displayed && ((void 0 === p.show && null === p.threshold ? c > this.c.threshold : c > p.threshold) || (!0 !== p.show && 1 >= v))) {
                            this.dom.container.addClass(this.classes.hidden);
                            this.s.displayed = !1;
                            return;
                        }
                        this.s.rowData.arrayOriginal = this.s.rowData.arrayFilter;
                        this.s.rowData.binsOriginal = this.s.rowData.bins;
                        this.s.displayed = !0;
                    }
                } else this.s.displayed = !0;
                this._displayPane();
                if (!this.s.listSet)
                    this.dom.dtP.on("stateLoadParams.dt", function (E, F, D) {
                        g.isEmptyObject(f.state.loaded()) &&
                            g.each(D, function (B, H) {
                                delete D[B];
                            });
                    });
                null !== e && 0 < g(this.dom.panesContainer).has(e).length ? g(this.dom.container).insertAfter(e) : g(this.dom.panesContainer).prepend(this.dom.container);
                v = g.fn.dataTable.ext.errMode;
                g.fn.dataTable.ext.errMode = "none";
                e = r.Scroller;
                this.s.dtPane = g(this.dom.dtP).DataTable(
                    g.extend(
                        !0,
                        {
                            columnDefs: [
                                {
                                    className: "dtsp-nameColumn",
                                    data: "display",
                                    render: function (E, F, D) {
                                        if ("sort" === F) return D.sort;
                                        if ("type" === F) return D.type;
                                        var B;
                                        (k.s.filteringActive || k.s.showFiltered) && k.c.viewTotal ? (B = z.replace(/{total}/, D.total)) : (B = w.replace(/{total}/, D.total));
                                        for (B = B.replace(/{shown}/, D.shown); -1 !== B.indexOf("{total}"); ) B = B.replace(/{total}/, D.total);
                                        for (; -1 !== B.indexOf("{shown}"); ) B = B.replace(/{shown}/, D.shown);
                                        F = '<span class="' + k.classes.pill + '">' + B + "</span>";
                                        if (k.c.hideCount || p.hideCount) F = "";
                                        return (
                                            '<div class="' +
                                            k.classes.nameCont +
                                            '"><span title="' +
                                            ("string" === typeof E && null !== E.match(/<[^>]*>/) ? E.replace(/<[^>]*>/g, "") : E) +
                                            '" class="' +
                                            k.classes.name +
                                            '">' +
                                            E +
                                            "</span>" +
                                            F +
                                            "</div>"
                                        );
                                    },
                                    targets: 0,
                                    type: void 0 !== f.settings()[0].aoColumns[this.s.index] ? f.settings()[0].aoColumns[this.s.index]._sManualType : null,
                                },
                                { className: "dtsp-countColumn " + this.classes.badgePill, data: "shown", orderData: [1, 2], targets: 1, visible: !1 },
                                { data: "total", targets: 2, visible: !1 },
                            ],
                            deferRender: !0,
                            dom: "t",
                            info: !1,
                            language: this.s.dt.settings()[0].oLanguage,
                            paging: e ? !0 : !1,
                            scrollX: !1,
                            scrollY: "200px",
                            scroller: e ? !0 : !1,
                            select: !0,
                            stateSave: f.settings()[0].oFeatures.bStateSave ? !0 : !1,
                        },
                        this.c.dtOpts,
                        void 0 !== p ? p.dtOpts : {},
                        void 0 === this.s.colOpts.options && this.colExists
                            ? void 0
                            : {
                                  createdRow: function (E, F, D) {
                                      g(E).addClass(F.className);
                                  },
                              },
                        null !== this.customPaneSettings && void 0 !== this.customPaneSettings.dtOpts ? this.customPaneSettings.dtOpts : {}
                    )
                );
                g(this.dom.dtP).addClass(this.classes.table);
                g(this.dom.searchBox).attr("placeholder", void 0 !== p.header ? p.header : this.colExists ? f.settings()[0].aoColumns[this.s.index].sTitle : this.customPaneSettings.header || "Custom Pane");
                g.fn.dataTable.select.init(this.s.dtPane);
                g.fn.dataTable.ext.errMode = v;
                if (this.colExists) {
                    l = (l = l.search()) ? l.substr(1, l.length - 2).split("|") : [];
                    var C = 0;
                    n.arrayFilter.forEach(function (E) {
                        "" === E.filter && C++;
                    });
                    v = 0;
                    for (e = n.arrayFilter.length; v < e; v++) {
                        l = !1;
                        b = 0;
                        for (A = this.s.serverSelect; b < A.length; b++) (c = A[b]), c.filter === n.arrayFilter[v].filter && (l = !0);
                        if (this.s.dt.page.info().serverSide && (!this.c.cascadePanes || (this.c.cascadePanes && 0 !== n.bins[n.arrayFilter[v].filter]) || (this.c.cascadePanes && null !== d) || l))
                            for (
                                l = this._addRow(
                                    n.arrayFilter[v].display,
                                    n.arrayFilter[v].filter,
                                    d ? n.binsTotal[n.arrayFilter[v].filter] : n.bins[n.arrayFilter[v].filter],
                                    this.c.viewTotal || d ? String(n.binsTotal[n.arrayFilter[v].filter]) : n.bins[n.arrayFilter[v].filter],
                                    n.arrayFilter[v].sort,
                                    n.arrayFilter[v].type
                                ),
                                    b = 0,
                                    A = this.s.serverSelect;
                                b < A.length;
                                b++
                            )
                                (c = A[b]), c.filter === n.arrayFilter[v].filter && ((this.s.serverSelecting = !0), l.select(), (this.s.serverSelecting = !1));
                        else
                            this.s.dt.page.info().serverSide || !n.arrayFilter[v] || (void 0 === n.bins[n.arrayFilter[v].filter] && this.c.cascadePanes)
                                ? this.s.dt.page.info().serverSide || this._addRow("", C, C, "", "", "")
                                : this._addRow(n.arrayFilter[v].display, n.arrayFilter[v].filter, n.bins[n.arrayFilter[v].filter], n.binsTotal[n.arrayFilter[v].filter], n.arrayFilter[v].sort, n.arrayFilter[v].type);
                    }
                }
                r.select.init(this.s.dtPane);
                (void 0 !== p.options || (null !== this.customPaneSettings && void 0 !== this.customPaneSettings.options)) && this._getComparisonRows();
                this.s.dtPane.draw();
                this._adjustTopRow();
                this.s.listSet || (this._setListeners(), (this.s.listSet = !0));
                for (d = 0; d < a.length; d++)
                    if (((n = a[d]), void 0 !== n))
                        for (v = 0, e = this.s.dtPane.rows().indexes().toArray(); v < e.length; v++)
                            (l = e[v]),
                                void 0 !== this.s.dtPane.row(l).data() &&
                                    n.filter === this.s.dtPane.row(l).data().filter &&
                                    (this.s.dt.page.info().serverSide ? ((this.s.serverSelecting = !0), this.s.dtPane.row(l).select(), (this.s.serverSelecting = !1)) : this.s.dtPane.row(l).select());
                this.s.dt.page.info().serverSide && this.s.dtPane.search(g(this.dom.searchBox).val()).draw();
                if (x && x.searchPanes && x.searchPanes.panes)
                    for (this.c.cascadePanes || this._reloadSelect(x), a = 0, x = x.searchPanes.panes; a < x.length; a++)
                        (d = x[a]), d.id === this.s.index && (g(this.dom.searchBox).val(d.searchTerm), g(this.dom.searchBox).trigger("input"), this.s.dtPane.order(d.order).draw());
                this.s.dt.state.save();
                return !0;
            };
            h.prototype._detailsPane = function () {
                var a = this.s.dt;
                this.s.rowData.arrayTotals = [];
                this.s.rowData.binsTotal = {};
                var b = this.s.dt.settings()[0];
                a = a.rows().indexes();
                if (!this.s.dt.page.info().serverSide) for (var c = 0; c < a.length; c++) this._populatePaneArray(a[c], this.s.rowData.arrayTotals, b, this.s.rowData.binsTotal);
            };
            h.prototype._displayPane = function () {
                var a = this.dom.container,
                    b = this.s.colOpts,
                    c = parseInt(this.c.layout.split("-")[1], 10);
                g(this.dom.topRow).empty();
                g(this.dom.dtP).empty();
                g(this.dom.topRow).addClass(this.classes.topRow);
                3 < c && g(this.dom.container).addClass(this.classes.smallGap);
                g(this.dom.topRow).addClass(this.classes.subRowsContainer);
                g(this.dom.upper).appendTo(this.dom.topRow);
                g(this.dom.lower).appendTo(this.dom.topRow);
                g(this.dom.searchCont).appendTo(this.dom.upper);
                g(this.dom.buttonGroup).appendTo(this.dom.lower);
                (!1 === this.c.dtOpts.searching ||
                    (void 0 !== b.dtOpts && !1 === b.dtOpts.searching) ||
                    !this.c.controls ||
                    !b.controls ||
                    (null !== this.customPaneSettings && void 0 !== this.customPaneSettings.dtOpts && void 0 !== this.customPaneSettings.dtOpts.searching && !this.customPaneSettings.dtOpts.searching)) &&
                    g(this.dom.searchBox).attr("disabled", "disabled").removeClass(this.classes.paneInputButton).addClass(this.classes.disabledButton);
                g(this.dom.searchBox).appendTo(this.dom.searchCont);
                this._searchContSetup();
                this.c.clear && this.c.controls && b.controls && g(this.dom.clear).appendTo(this.dom.buttonGroup);
                this.c.orderable && b.orderable && this.c.controls && b.controls && g(this.dom.nameButton).appendTo(this.dom.buttonGroup);
                !this.c.hideCount && !b.hideCount && this.c.orderable && b.orderable && this.c.controls && b.controls && g(this.dom.countButton).appendTo(this.dom.buttonGroup);
                g(this.dom.topRow).prependTo(this.dom.container);
                g(a).append(this.dom.dtP);
                g(a).show();
            };
            h.prototype._getBonusOptions = function () {
                return g.extend(!0, {}, h.defaults, { orthogonal: { threshold: null }, threshold: null }, void 0 !== this.c ? this.c : {});
            };
            h.prototype._getComparisonRows = function () {
                var a = this.s.colOpts;
                a = void 0 !== a.options ? a.options : null !== this.customPaneSettings && void 0 !== this.customPaneSettings.options ? this.customPaneSettings.options : void 0;
                if (void 0 !== a) {
                    var b = this.s.dt.rows({ search: "applied" }).data().toArray(),
                        c = this.s.dt.rows({ search: "applied" }),
                        d = this.s.dt.rows().data().toArray(),
                        e = this.s.dt.rows(),
                        k = [];
                    this.s.dtPane.clear();
                    for (var f = 0; f < a.length; f++) {
                        var l = a[f],
                            p = "" !== l.label ? l.label : this.c.emptyMessage,
                            n = l.className,
                            w = p,
                            z = "function" === typeof l.value ? l.value : [],
                            x = 0,
                            A = p,
                            v = 0;
                        if ("function" === typeof l.value) {
                            for (var C = 0; C < b.length; C++) l.value.call(this.s.dt, b[C], c[0][C]) && x++;
                            for (C = 0; C < d.length; C++) l.value.call(this.s.dt, d[C], e[0][C]) && v++;
                            "function" !== typeof z && z.push(l.filter);
                        }
                        (!this.c.cascadePanes || (this.c.cascadePanes && 0 !== x)) && k.push(this._addRow(w, z, x, v, A, p, n));
                    }
                    return k;
                }
            };
            h.prototype._getOptions = function () {
                return g.extend(!0, {}, h.defaults, { emptyMessage: !1, orthogonal: { threshold: null }, threshold: null }, this.s.dt.settings()[0].aoColumns[this.s.index].searchPanes);
            };
            h.prototype._makeSelection = function () {
                this.updateTable();
                this.s.updating = !0;
                this.s.dt.draw();
                this.s.updating = !1;
            };
            h.prototype._populatePane = function (a) {
                void 0 === a && (a = !1);
                var b = this.s.dt;
                this.s.rowData.arrayFilter = [];
                this.s.rowData.bins = {};
                var c = this.s.dt.settings()[0];
                if (!this.s.dt.page.info().serverSide) {
                    var d = 0;
                    for (a = ((!this.c.cascadePanes && !this.c.viewTotal) || this.s.clearing || a ? b.rows().indexes() : b.rows({ search: "applied" }).indexes()).toArray(); d < a.length; d++)
                        this._populatePaneArray(a[d], this.s.rowData.arrayFilter, c);
                }
            };
            h.prototype._populatePaneArray = function (a, b, c, d) {
                void 0 === d && (d = this.s.rowData.bins);
                var e = this.s.colOpts;
                if ("string" === typeof e.orthogonal) (c = c.oApi._fnGetCellData(c, a, this.s.index, e.orthogonal)), this.s.rowData.filterMap.set(a, c), this._addOption(c, c, c, c, b, d);
                else {
                    var k = c.oApi._fnGetCellData(c, a, this.s.index, e.orthogonal.search);
                    "string" === typeof k && (k = k.replace(/<[^>]*>/g, ""));
                    this.s.rowData.filterMap.set(a, k);
                    d[k]
                        ? d[k]++
                        : ((d[k] = 1),
                          this._addOption(
                              k,
                              c.oApi._fnGetCellData(c, a, this.s.index, e.orthogonal.display),
                              c.oApi._fnGetCellData(c, a, this.s.index, e.orthogonal.sort),
                              c.oApi._fnGetCellData(c, a, this.s.index, e.orthogonal.type),
                              b,
                              d
                          ));
                    this.s.rowData.totalOptions++;
                }
            };
            h.prototype._reloadSelect = function (a) {
                if (void 0 !== a) {
                    for (var b, c = 0; c < a.searchPanes.panes.length; c++)
                        if (a.searchPanes.panes[c].id === this.s.index) {
                            b = c;
                            break;
                        }
                    if (void 0 !== b) {
                        c = this.s.dtPane;
                        var d = c
                                .rows({ order: "index" })
                                .data()
                                .map(function (f) {
                                    return null !== f.filter ? f.filter.toString() : null;
                                })
                                .toArray(),
                            e = 0;
                        for (a = a.searchPanes.panes[b].selected; e < a.length; e++) {
                            b = a[e];
                            var k = -1;
                            null !== b && (k = d.indexOf(b.toString()));
                            -1 < k && (c.row(k).select(), this.s.dt.state.save());
                        }
                    }
                }
            };
            h.prototype._search = function (a, b) {
                for (var c = this.s.colOpts, d = this.s.dt, e = 0, k = this.selections; e < k.length; e++) {
                    var f = k[e];
                    if (Array.isArray(a)) {
                        if (-1 !== a.indexOf(f.filter)) return !0;
                    } else if ("function" === typeof f.filter)
                        if (f.filter.call(d, d.row(b).data(), b)) {
                            if ("or" === c.combiner) return !0;
                        } else {
                            if ("and" === c.combiner) return !1;
                        }
                    else if (a === f.filter || (("string" !== typeof a || 0 !== a.length) && a == f.filter) || (null === f.filter && "string" === typeof a && "" === a)) return !0;
                }
                return "and" === c.combiner ? !0 : !1;
            };
            h.prototype._searchContSetup = function () {
                this.c.controls && this.s.colOpts.controls && g(this.dom.searchButton).appendTo(this.dom.searchLabelCont);
                !1 === this.c.dtOpts.searching ||
                    !1 === this.s.colOpts.dtOpts.searching ||
                    (null !== this.customPaneSettings && void 0 !== this.customPaneSettings.dtOpts && void 0 !== this.customPaneSettings.dtOpts.searching && !this.customPaneSettings.dtOpts.searching) ||
                    g(this.dom.searchLabelCont).appendTo(this.dom.searchCont);
            };
            h.prototype._searchExtras = function () {
                var a = this.s.updating;
                this.s.updating = !0;
                var b = this.s.dtPane.rows({ selected: !0 }).data().pluck("filter").toArray(),
                    c = b.indexOf(!1 !== this.s.colOpts.emptyMessage ? this.s.colOpts.emptyMessage : this.c.emptyMessage),
                    d = g(this.s.dtPane.table().container());
                -1 < c && (b[c] = "");
                0 < b.length ? d.addClass(this.classes.selected) : 0 === b.length && d.removeClass(this.classes.selected);
                this.s.updating = a;
            };
            h.prototype._uniqueRatio = function (a, b) {
                return 0 < b && ((0 < this.s.rowData.totalOptions && !this.s.dt.page.info().serverSide) || (this.s.dt.page.info().serverSide && 0 < this.s.tableLength)) ? a / this.s.rowData.totalOptions : 1;
            };
            h.prototype._updateCommon = function (a) {
                void 0 === a && (a = !1);
                if (
                    !(
                        this.s.dt.page.info().serverSide ||
                        void 0 === this.s.dtPane ||
                        (this.s.filteringActive && !this.c.cascadePanes && !0 !== a) ||
                        (!0 === this.c.cascadePanes && !0 === this.s.selectPresent) ||
                        (this.s.lastSelect && this.s.lastCascade)
                    )
                ) {
                    var b = this.s.colOpts,
                        c = this.s.dtPane.rows({ selected: !0 }).data().toArray();
                    a = g(this.s.dtPane.table().node()).parent()[0].scrollTop;
                    var d = this.s.rowData;
                    this.s.dtPane.clear();
                    if (this.colExists) {
                        0 === d.arrayFilter.length
                            ? this._populatePane()
                            : this.c.cascadePanes && this.s.dt.rows().data().toArray().length === this.s.dt.rows({ search: "applied" }).data().toArray().length
                            ? ((d.arrayFilter = d.arrayOriginal), (d.bins = d.binsOriginal))
                            : (this.c.viewTotal || this.c.cascadePanes) && this._populatePane();
                        this.c.viewTotal ? this._detailsPane() : (d.binsTotal = d.bins);
                        this.c.viewTotal && !this.c.cascadePanes && (d.arrayFilter = d.arrayTotals);
                        for (
                            var e = function (p) {
                                    if (p && ((void 0 !== d.bins[p.filter] && 0 !== d.bins[p.filter] && k.c.cascadePanes) || !k.c.cascadePanes || k.s.clearing)) {
                                        var n = k._addRow(
                                                p.display,
                                                p.filter,
                                                k.c.viewTotal ? (void 0 !== d.bins[p.filter] ? d.bins[p.filter] : 0) : d.bins[p.filter],
                                                k.c.viewTotal ? String(d.binsTotal[p.filter]) : d.bins[p.filter],
                                                p.sort,
                                                p.type
                                            ),
                                            w = c.findIndex(function (z) {
                                                return z.filter === p.filter;
                                            });
                                        -1 !== w && (n.select(), c.splice(w, 1));
                                    }
                                },
                                k = this,
                                f = 0,
                                l = d.arrayFilter;
                            f < l.length;
                            f++
                        )
                            e(l[f]);
                    }
                    if ((void 0 !== b.searchPanes && void 0 !== b.searchPanes.options) || void 0 !== b.options || (null !== this.customPaneSettings && void 0 !== this.customPaneSettings.options))
                        for (
                            e = function (p) {
                                var n = c.findIndex(function (w) {
                                    if (w.display === p.data().display) return !0;
                                });
                                -1 !== n && (p.select(), c.splice(n, 1));
                            },
                                f = 0,
                                l = this._getComparisonRows();
                            f < l.length;
                            f++
                        )
                            (b = l[f]), e(b);
                    for (e = 0; e < c.length; e++) (b = c[e]), (b = this._addRow(b.display, b.filter, 0, this.c.viewTotal ? b.total : 0, b.display, b.display)), (this.s.updating = !0), b.select(), (this.s.updating = !1);
                    this.s.dtPane.draw();
                    this.s.dtPane.table().node().parentNode.scrollTop = a;
                }
            };
            h.version = "1.1.0";
            h.classes = {
                buttonGroup: "dtsp-buttonGroup",
                buttonSub: "dtsp-buttonSub",
                clear: "dtsp-clear",
                clearAll: "dtsp-clearAll",
                clearButton: "clearButton",
                container: "dtsp-searchPane",
                countButton: "dtsp-countButton",
                disabledButton: "dtsp-disabledButton",
                dull: "dtsp-dull",
                hidden: "dtsp-hidden",
                hide: "dtsp-hide",
                layout: "dtsp-",
                name: "dtsp-name",
                nameButton: "dtsp-nameButton",
                nameCont: "dtsp-nameCont",
                narrow: "dtsp-narrow",
                paneButton: "dtsp-paneButton",
                paneInputButton: "dtsp-paneInputButton",
                pill: "dtsp-pill",
                search: "dtsp-search",
                searchCont: "dtsp-searchCont",
                searchIcon: "dtsp-searchIcon",
                searchLabelCont: "dtsp-searchButtonCont",
                selected: "dtsp-selected",
                smallGap: "dtsp-smallGap",
                subRow1: "dtsp-subRow1",
                subRow2: "dtsp-subRow2",
                subRowsContainer: "dtsp-subRowsContainer",
                title: "dtsp-title",
                topRow: "dtsp-topRow",
            };
            h.defaults = {
                cascadePanes: !1,
                clear: !0,
                combiner: "or",
                controls: !0,
                container: function (a) {
                    return a.table().container();
                },
                dtOpts: {},
                emptyMessage: "<i>No Data</i>",
                hideCount: !1,
                layout: "columns-3",
                name: void 0,
                orderable: !0,
                orthogonal: { display: "display", filter: "filter", hideCount: !1, search: "filter", show: void 0, sort: "sort", threshold: 0.6, type: "type" },
                preSelect: [],
                threshold: 0.6,
                viewTotal: !1,
            };
            return h;
        })(),
        q,
        y,
        G = (function () {
            function h(a, b, c) {
                var d = this;
                void 0 === c && (c = !1);
                this.regenerating = !1;
                if (!y || !y.versionCheck || !y.versionCheck("1.10.0")) throw Error("SearchPane requires DataTables 1.10 or newer");
                if (!y.select) throw Error("SearchPane requires Select");
                var e = new y.Api(a);
                this.classes = q.extend(!0, {}, h.classes);
                this.c = q.extend(!0, {}, h.defaults, b);
                this.dom = {
                    clearAll: q('<button type="button">Clear All</button>').addClass(this.classes.clearAll),
                    container: q("<div/>").addClass(this.classes.panes).text(e.i18n("searchPanes.loadMessage", "Loading Search Panes...")),
                    emptyMessage: q("<div/>").addClass(this.classes.emptyMessage),
                    options: q("<div/>").addClass(this.classes.container),
                    panes: q("<div/>").addClass(this.classes.container),
                    title: q("<div/>").addClass(this.classes.title),
                    titleRow: q("<div/>").addClass(this.classes.titleRow),
                    wrapper: q("<div/>"),
                };
                this.s = { colOpts: [], dt: e, filterPane: -1, panes: [], selectionList: [], serverData: {}, stateRead: !1, updating: !1 };
                if (void 0 === e.settings()[0]._searchPanes) {
                    e.on("xhr", function (k, f, l, p) {
                        l.searchPanes && l.searchPanes.options && ((d.s.serverData = l.searchPanes.options), (d.s.serverData.tableLength = l.recordsTotal), d._serverTotals());
                    });
                    e.settings()[0]._searchPanes = this;
                    this.dom.clearAll.text(e.i18n("searchPanes.clearMessage", "Limpiar todo"));
                    this._getState();
                    if (this.s.dt.settings()[0]._bInitComplete || c) this._paneDeclare(e, a, b);
                    else
                        e.one("preInit.dt", function (k) {
                            d._paneDeclare(e, a, b);
                        });
                    return this;
                }
            }
            h.prototype.clearSelections = function () {
                this.dom.container.find(this.classes.search).each(function () {
                    q(this).val("");
                    q(this).trigger("input");
                });
                for (var a = [], b = 0, c = this.s.panes; b < c.length; b++) {
                    var d = c[b];
                    void 0 !== d.s.dtPane && a.push(d.clearPane());
                }
                this.s.dt.draw();
                return a;
            };
            h.prototype.getNode = function () {
                return this.dom.container;
            };
            h.prototype.rebuild = function (a, b) {
                void 0 === a && (a = !1);
                void 0 === b && (b = !1);
                q(this.dom.emptyMessage).remove();
                var c = [];
                !1 === a && q(this.dom.panes).empty();
                for (var d = 0, e = this.s.panes; d < e.length; d++) {
                    var k = e[d];
                    if (!1 === a || k.s.index === a)
                        k.clearData(),
                            c.push(
                                k.rebuildPane(
                                    void 0 !== this.s.selectionList[this.s.selectionList.length - 1] ? k.s.index === this.s.selectionList[this.s.selectionList.length - 1].index : !1,
                                    this.s.dt.page.info().serverSide ? this.s.serverData : void 0,
                                    null,
                                    b
                                )
                            ),
                            q(this.dom.panes).append(k.dom.container);
                }
                this.s.dt.page.info().serverSide || this.s.dt.draw();
                this.c.cascadePanes || this.c.viewTotal ? this.redrawPanes(!0) : this._updateSelection();
                this._updateFilterCount();
                this._attachPaneContainer();
                this.s.dt.draw();
                return 1 === c.length ? c[0] : c;
            };
            h.prototype.redrawPanes = function (a) {
                void 0 === a && (a = !1);
                var b = this.s.dt;
                if (!this.s.updating && !this.s.dt.page.info().serverSide) {
                    var c = !0,
                        d = this.s.filterPane;
                    if (b.rows({ search: "applied" }).data().toArray().length === b.rows().data().toArray().length) c = !1;
                    else if (this.c.viewTotal)
                        for (var e = 0, k = this.s.panes; e < k.length; e++) {
                            var f = k[e];
                            if (void 0 !== f.s.dtPane) {
                                var l = f.s.dtPane.rows({ selected: !0 }).data().toArray().length;
                                if (0 === l)
                                    for (var p = 0, n = this.s.selectionList; p < n.length; p++) {
                                        var w = n[p];
                                        w.index === f.s.index && 0 !== w.rows.length && (l = w.rows.length);
                                    }
                                0 < l && -1 === d ? (d = f.s.index) : 0 < l && (d = null);
                            }
                        }
                    k = void 0;
                    e = [];
                    if (this.regenerating) {
                        k = -1;
                        1 === e.length && (k = e[0].index);
                        a = 0;
                        for (e = this.s.panes; a < e.length; a++)
                            if (((f = e[a]), void 0 !== f.s.dtPane)) {
                                b = !0;
                                f.s.filteringActive = !0;
                                if ((-1 !== d && null !== d && d === f.s.index) || !1 === c || f.s.index === k) (b = !1), (f.s.filteringActive = !1);
                                f.updatePane(b ? c : b);
                            }
                        this._updateFilterCount();
                    } else {
                        l = 0;
                        for (p = this.s.panes; l < p.length; l++)
                            if (((f = p[l]), f.s.selectPresent)) {
                                this.s.selectionList.push({ index: f.s.index, rows: f.s.dtPane.rows({ selected: !0 }).data().toArray(), protect: !1 });
                                b.state.save();
                                break;
                            } else f.s.deselect && ((k = f.s.index), (n = f.s.dtPane.rows({ selected: !0 }).data().toArray()), 0 < n.length && this.s.selectionList.push({ index: f.s.index, rows: n, protect: !0 }));
                        if (0 < this.s.selectionList.length) for (b = this.s.selectionList[this.s.selectionList.length - 1].index, l = 0, p = this.s.panes; l < p.length; l++) (f = p[l]), (f.s.lastSelect = f.s.index === b);
                        for (f = 0; f < this.s.selectionList.length; f++)
                            if (this.s.selectionList[f].index !== k || !0 === this.s.selectionList[f].protect) {
                                b = !1;
                                for (l = f + 1; l < this.s.selectionList.length; l++) this.s.selectionList[l].index === this.s.selectionList[f].index && (b = !0);
                                b || (e.push(this.s.selectionList[f]), (this.s.selectionList[f].protect = !1));
                            }
                        k = -1;
                        1 === e.length && (k = e[0].index);
                        l = 0;
                        for (p = this.s.panes; l < p.length; l++)
                            if (((f = p[l]), void 0 !== f.s.dtPane)) {
                                b = !0;
                                f.s.filteringActive = !0;
                                if ((-1 !== d && null !== d && d === f.s.index) || !1 === c || f.s.index === k) (b = !1), (f.s.filteringActive = !1);
                                f.updatePane(b ? c : !1);
                            }
                        this._updateFilterCount();
                        if (0 < e.length && (e.length < this.s.selectionList.length || a)) for (this._cascadeRegen(e), b = e[e.length - 1].index, d = 0, a = this.s.panes; d < a.length; d++) (f = a[d]), (f.s.lastSelect = f.s.index === b);
                        else if (0 < e.length)
                            for (f = 0, a = this.s.panes; f < a.length; f++)
                                if (((e = a[f]), void 0 !== e.s.dtPane)) {
                                    b = !0;
                                    e.s.filteringActive = !0;
                                    if ((-1 !== d && null !== d && d === e.s.index) || !1 === c) (b = !1), (e.s.filteringActive = !1);
                                    e.updatePane(b ? c : b);
                                }
                    }
                    c || (this.s.selectionList = []);
                }
            };
            h.prototype._attach = function () {
                var a = this;
                q(this.dom.container).removeClass(this.classes.hide);
                q(this.dom.titleRow).removeClass(this.classes.hide);
                q(this.dom.titleRow).remove();
                q(this.dom.title).appendTo(this.dom.titleRow);
                this.c.clear &&
                    (q(this.dom.clearAll).appendTo(this.dom.titleRow),
                    q(this.dom.clearAll).on("click.dtsps", function () {
                        a.clearSelections();
                    }));
                q(this.dom.titleRow).appendTo(this.dom.container);
                for (var b = 0, c = this.s.panes; b < c.length; b++) q(c[b].dom.container).appendTo(this.dom.panes);
                q(this.dom.panes).appendTo(this.dom.container);
                0 === q("div." + this.classes.container).length && q(this.dom.container).prependTo(this.s.dt);
                return this.dom.container;
            };
            h.prototype._attachExtras = function () {
                q(this.dom.container).removeClass(this.classes.hide);
                q(this.dom.titleRow).removeClass(this.classes.hide);
                q(this.dom.titleRow).remove();
                q(this.dom.title).appendTo(this.dom.titleRow);
                this.c.clear && q(this.dom.clearAll).appendTo(this.dom.titleRow);
                q(this.dom.titleRow).appendTo(this.dom.container);
                return this.dom.container;
            };
            h.prototype._attachMessage = function () {
                try {
                    var a = this.s.dt.i18n("searchPanes.emptyPanes", "No SearchPanes");
                } catch (b) {
                    a = null;
                }
                if (null === a) q(this.dom.container).addClass(this.classes.hide), q(this.dom.titleRow).removeClass(this.classes.hide);
                else return q(this.dom.container).removeClass(this.classes.hide), q(this.dom.titleRow).addClass(this.classes.hide), q(this.dom.emptyMessage).text(a), this.dom.emptyMessage.appendTo(this.dom.container), this.dom.container;
            };
            h.prototype._attachPaneContainer = function () {
                for (var a = 0, b = this.s.panes; a < b.length; a++) if (!0 === b[a].s.displayed) return this._attach();
                return this._attachMessage();
            };
            h.prototype._cascadeRegen = function (a) {
                this.regenerating = !0;
                var b = -1;
                1 === a.length && (b = a[0].index);
                for (var c = 0, d = this.s.panes; c < d.length; c++) {
                    var e = d[c];
                    e.setCascadeRegen(!0);
                    e.setClear(!0);
                    ((void 0 !== e.s.dtPane && e.s.index === b) || void 0 !== e.s.dtPane) && e.clearPane();
                    e.setClear(!1);
                }
                this._makeCascadeSelections(a);
                this.s.selectionList = a;
                a = 0;
                for (b = this.s.panes; a < b.length; a++) (e = b[a]), e.setCascadeRegen(!1);
                this.regenerating = !1;
            };
            h.prototype._checkMessage = function () {
                for (var a = 0, b = this.s.panes; a < b.length; a++) if (!0 === b[a].s.displayed) return;
                return this._attachMessage();
            };
            h.prototype._getState = function () {
                var a = this.s.dt.state.loaded();
                a && a.searchPanes && void 0 !== a.searchPanes.selectionList && (this.s.selectionList = a.searchPanes.selectionList);
            };
            h.prototype._makeCascadeSelections = function (a) {
                for (var b = 0; b < a.length; b++)
                    for (
                        var c = function (f) {
                                if (f.s.index === a[b].index && void 0 !== f.s.dtPane) {
                                    b === a.length - 1 && (f.s.lastCascade = !0);
                                    0 < f.s.dtPane.rows({ selected: !0 }).data().toArray().length && void 0 !== f.s.dtPane && (f.setClear(!0), f.clearPane(), f.setClear(!1));
                                    for (
                                        var l = function (w) {
                                                f.s.dtPane.rows().every(function (z) {
                                                    void 0 !== f.s.dtPane.row(z).data() && void 0 !== w && f.s.dtPane.row(z).data().filter === w.filter && f.s.dtPane.row(z).select();
                                                });
                                            },
                                            p = 0,
                                            n = a[b].rows;
                                        p < n.length;
                                        p++
                                    )
                                        l(n[p]);
                                    d._updateFilterCount();
                                    f.s.lastCascade = !1;
                                }
                            },
                            d = this,
                            e = 0,
                            k = this.s.panes;
                        e < k.length;
                        e++
                    )
                        c(k[e]);
                this.s.dt.state.save();
            };
            h.prototype._paneDeclare = function (a, b, c) {
                var d = this;
                a.columns(0 < this.c.columns.length ? this.c.columns : void 0)
                    .eq(0)
                    .each(function (l) {
                        d.s.panes.push(new u(b, c, l, d.c.layout, d.dom.panes));
                    });
                for (var e = a.columns().eq(0).toArray().length, k = this.c.panes.length, f = 0; f < k; f++) this.s.panes.push(new u(b, c, e + f, this.c.layout, this.dom.panes, this.c.panes[f]));
                if (0 < this.c.order.length)
                    for (
                        e = this.c.order.map(function (l, p, n) {
                            return d._findPane(l);
                        }),
                            this.dom.panes.empty(),
                            this.s.panes = e,
                            e = 0,
                            k = this.s.panes;
                        e < k.length;
                        e++
                    )
                        this.dom.panes.append(k[e].dom.container);
                this.s.dt.settings()[0]._bInitComplete
                    ? this._startup(a)
                    : this.s.dt.settings()[0].aoInitComplete.push({
                          fn: function () {
                              d._startup(a);
                          },
                      });
            };
            h.prototype._findPane = function (a) {
                for (var b = 0, c = this.s.panes; b < c.length; b++) {
                    var d = c[b];
                    if (a === d.s.name) return d;
                }
            };
            h.prototype._serverTotals = function () {
                for (var a = !1, b = !1, c = this.s.dt, d = 0, e = this.s.panes; d < e.length; d++) {
                    var k = e[d];
                    if (k.s.selectPresent) {
                        this.s.selectionList.push({ index: k.s.index, rows: k.s.dtPane.rows({ selected: !0 }).data().toArray(), protect: !1 });
                        c.state.save();
                        k.s.selectPresent = !1;
                        a = !0;
                        break;
                    } else k.s.deselect && ((b = k.s.dtPane.rows({ selected: !0 }).data().toArray()), 0 < b.length && this.s.selectionList.push({ index: k.s.index, rows: b, protect: !0 }), (b = a = !0));
                }
                if (a) {
                    k = [];
                    for (c = 0; c < this.s.selectionList.length; c++) {
                        d = !1;
                        for (e = c + 1; e < this.s.selectionList.length; e++) this.s.selectionList[e].index === this.s.selectionList[c].index && (d = !0);
                        !d && 0 < this.s.panes[this.s.selectionList[c].index].s.dtPane.rows({ selected: !0 }).data().toArray().length && k.push(this.s.selectionList[c]);
                    }
                    this.s.selectionList = k;
                } else this.s.selectionList = [];
                c = -1;
                if (b && 1 === this.s.selectionList.length)
                    for (b = 0, d = this.s.panes; b < d.length; b++) (k = d[b]), (k.s.lastSelect = !1), (k.s.deselect = !1), void 0 !== k.s.dtPane && 0 < k.s.dtPane.rows({ selected: !0 }).data().toArray().length && (c = k.s.index);
                else if (0 < this.s.selectionList.length) for (b = this.s.selectionList[this.s.selectionList.length - 1].index, d = 0, e = this.s.panes; d < e.length; d++) (k = e[d]), (k.s.lastSelect = k.s.index === b), (k.s.deselect = !1);
                else if (0 === this.s.selectionList.length) for (b = 0, d = this.s.panes; b < d.length; b++) (k = d[b]), (k.s.lastSelect = !1), (k.s.deselect = !1);
                q(this.dom.panes).empty();
                b = 0;
                for (d = this.s.panes; b < d.length; b++)
                    (k = d[b]),
                        k.s.lastSelect ? k._setListeners() : k.rebuildPane(void 0, this.s.dt.page.info().serverSide ? this.s.serverData : void 0, k.s.index === c ? !0 : null, !0),
                        q(this.dom.panes).append(k.dom.container),
                        void 0 !== k.s.dtPane && ((q(k.s.dtPane.table().node()).parent()[0].scrollTop = k.s.scrollTop), q.fn.dataTable.select.init(k.s.dtPane));
                this.s.dt.page.info().serverSide || this.s.dt.draw();
            };
            h.prototype._startup = function (a) {
                var b = this;
                q(this.dom.container).text("");
                this._attachExtras();
                q(this.dom.container).append(this.dom.panes);
                q(this.dom.panes).empty();
                var c = this.s.dt.state.loaded();
                if (this.c.viewTotal && !this.c.cascadePanes && null !== c && void 0 !== c && void 0 !== c.searchPanes && void 0 !== c.searchPanes.panes) {
                    for (var d = !1, e = 0, k = c.searchPanes.panes; e < k.length; e++) {
                        var f = k[e];
                        if (0 < f.selected.length) {
                            d = !0;
                            break;
                        }
                    }
                    if (d) for (d = 0, e = this.s.panes; d < e.length; d++) (f = e[d]), (f.s.showFiltered = !0);
                }
                d = 0;
                for (e = this.s.panes; d < e.length; d++) (f = e[d]), f.rebuildPane(void 0, 0 < Object.keys(this.s.serverData).length ? this.s.serverData : void 0), q(this.dom.panes).append(f.dom.container);
                this.s.dt.page.info().serverSide || this.s.dt.draw();
                this.s.stateRead || null === c || void 0 === c || (this.s.dt.page(c.start / this.s.dt.page.len()), this.s.dt.draw("page"));
                this.s.stateRead = !0;
                if (this.c.viewTotal && !this.c.cascadePanes) for (c = 0, d = this.s.panes; c < d.length; c++) (f = d[c]), f.updatePane();
                this._updateFilterCount();
                this._checkMessage();
                a.on("preDraw.dtsps", function () {
                    b._updateFilterCount();
                    (!b.c.cascadePanes && !b.c.viewTotal) || b.s.dt.page.info().serverSide ? b._updateSelection() : b.redrawPanes();
                    b.s.filterPane = -1;
                });
                this.s.dt.on("stateSaveParams.dtsp", function (l, p, n) {
                    void 0 === n.searchPanes && (n.searchPanes = {});
                    n.searchPanes.selectionList = b.s.selectionList;
                });
                this.s.dt.on("xhr", function () {
                    var l = !1;
                    if (!b.s.dt.page.info().serverSide)
                        b.s.dt.one("preDraw", function () {
                            if (!l) {
                                l = !0;
                                q(b.dom.panes).empty();
                                for (var p = 0, n = b.s.panes; p < n.length; p++) {
                                    var w = n[p];
                                    w.clearData();
                                    w.rebuildPane(void 0 !== b.s.selectionList[b.s.selectionList.length - 1] ? w.s.index === b.s.selectionList[b.s.selectionList.length - 1].index : !1, void 0, void 0, !0);
                                    q(b.dom.panes).append(w.dom.container);
                                }
                                b.s.dt.page.info().serverSide || b.s.dt.draw();
                                b.c.cascadePanes || b.c.viewTotal ? b.redrawPanes(b.c.cascadePanes) : b._updateSelection();
                                b._checkMessage();
                            }
                        });
                });
                c = 0;
                for (d = this.s.panes; c < d.length; c++)
                    if (((f = d[c]), void 0 !== f && void 0 !== f.s.dtPane && (void 0 !== f.s.colOpts.preSelect || void 0 !== f.customPaneSettings.preSelect))) {
                        e = f.s.dtPane.rows().data().toArray().length;
                        for (k = 0; k < e; k++)
                            (-1 !== f.s.colOpts.preSelect.indexOf(f.s.dtPane.cell(k, 0).data()) ||
                                (null !== f.customPaneSettings && void 0 !== f.customPaneSettings.preSelect && -1 !== f.customPaneSettings.preSelect.indexOf(f.s.dtPane.cell(k, 0).data()))) &&
                                f.s.dtPane.row(k).select();
                        f.updateTable();
                    }
                if (void 0 !== this.s.selectionList && 0 < this.s.selectionList.length)
                    for (c = this.s.selectionList[this.s.selectionList.length - 1].index, d = 0, e = this.s.panes; d < e.length; d++) (f = e[d]), (f.s.lastSelect = f.s.index === c);
                0 < this.s.selectionList.length && this.c.cascadePanes && this._cascadeRegen(this.s.selectionList);
                this._updateFilterCount();
                a.on("destroy.dtsps", function () {
                    for (var l = 0, p = b.s.panes; l < p.length; l++) p[l].destroy();
                    a.off(".dtsps");
                    q(b.dom.clearAll).off(".dtsps");
                    q(b.dom.container).remove();
                    b.clearSelections();
                });
                if (this.c.clear)
                    q(this.dom.clearAll).on("click.dtsps", function () {
                        b.clearSelections();
                    });
                if (this.s.dt.page.info().serverSide)
                    a.on("preXhr.dt", function (l, p, n) {
                        void 0 === n.searchPanes && (n.searchPanes = {});
                        l = 0;
                        for (p = b.s.panes; l < p.length; l++) {
                            var w = p[l],
                                z = b.s.dt.column(w.s.index).dataSrc();
                            void 0 === n.searchPanes[z] && (n.searchPanes[z] = {});
                            if (void 0 !== w.s.dtPane) {
                                w = w.s.dtPane.rows({ selected: !0 }).data().toArray();
                                for (var x = 0; x < w.length; x++) n.searchPanes[z][x] = w[x].filter;
                            }
                        }
                        b.c.viewTotal && b._prepViewTotal();
                    });
                else
                    a.on("preXhr.dt", function (l, p, n) {
                        l = 0;
                        for (p = b.s.panes; l < p.length; l++) p[l].clearData();
                    });
                a.settings()[0]._searchPanes = this;
            };
            h.prototype._prepViewTotal = function () {
                for (var a = this.s.filterPane, b = !1, c = 0, d = this.s.panes; c < d.length; c++) {
                    var e = d[c];
                    if (void 0 !== e.s.dtPane) {
                        var k = e.s.dtPane.rows({ selected: !0 }).data().toArray().length;
                        0 < k && -1 === a ? ((a = e.s.index), (b = !0)) : 0 < k && (a = null);
                    }
                }
                c = 0;
                for (d = this.s.panes; c < d.length; c++) if (((e = d[c]), void 0 !== e.s.dtPane && ((e.s.filteringActive = !0), (-1 !== a && null !== a && a === e.s.index) || !1 === b))) e.s.filteringActive = !1;
            };
            h.prototype._updateFilterCount = function () {
                for (var a = 0, b = 0, c = this.s.panes; b < c.length; b++) {
                    var d = c[b];
                    void 0 !== d.s.dtPane && (a += d.getPaneCount());
                }
                b = this.s.dt.i18n("searchPanes.title", "Filtros activos - %d", a);
                q(this.dom.title).text(b);
                void 0 !== this.c.filterChanged && "function" === typeof this.c.filterChanged && this.c.filterChanged.call(this.s.dt, a);
            };
            h.prototype._updateSelection = function () {
                this.s.selectionList = [];
                for (var a = 0, b = this.s.panes; a < b.length; a++) {
                    var c = b[a];
                    void 0 !== c.s.dtPane && this.s.selectionList.push({ index: c.s.index, rows: c.s.dtPane.rows({ selected: !0 }).data().toArray(), protect: !1 });
                }
                this.s.dt.state.save();
            };
            h.version = "1.2.1";
            h.classes = {
                clear: "dtsp-clear",
                clearAll: "dtsp-clearAll",
                container: "dtsp-searchPanes",
                emptyMessage: "dtsp-emptyMessage",
                hide: "dtsp-hidden",
                panes: "dtsp-panesContainer",
                search: "dtsp-search",
                title: "dtsp-title",
                titleRow: "dtsp-titleRow",
            };
            h.defaults = {
                cascadePanes: !1,
                clear: !0,
                container: function (a) {
                    return a.table().container();
                },
                columns: [],
                filterChanged: void 0,
                layout: "columns-3",
                order: [],
                panes: [],
                viewTotal: !1,
            };
            return h;
        })();
    (function (h) {
        "function" === typeof define && define.amd
            ? define(["jquery", "datatables.net"], function (a) {
                  return h(a, window, document);
              })
            : "object" === typeof exports
            ? (module.exports = function (a, b) {
                  a || (a = window);
                  (b && b.fn.dataTable) || (b = require("datatables.net")(a, b).$);
                  return h(b, a, a.document);
              })
            : h(window.jQuery, window, document);
    })(function (h, a, b) {
        function c(e, k) {
            void 0 === k && (k = !1);
            e = new d.Api(e);
            var f = e.init().searchPanes || d.defaults.searchPanes;
            return new G(e, f, k).getNode();
        }
        m(h);
        t(h);
        var d = h.fn.dataTable;
        h.fn.dataTable.SearchPanes = G;
        h.fn.DataTable.SearchPanes = G;
        h.fn.dataTable.SearchPane = u;
        h.fn.DataTable.SearchPane = u;
        a = h.fn.dataTable.Api.register;
        a("searchPanes()", function () {
            return this;
        });
        a("searchPanes.clearSelections()", function () {
            return this.iterator("table", function (e) {
                e._searchPanes && e._searchPanes.clearSelections();
            });
        });
        a("searchPanes.rebuildPane()", function (e, k) {
            return this.iterator("table", function (f) {
                f._searchPanes && f._searchPanes.rebuild(e, k);
            });
        });
        a("searchPanes.container()", function () {
            var e = this.context[0];
            return e._searchPanes ? e._searchPanes.getNode() : null;
        });
        h.fn.dataTable.ext.buttons.searchPanesClear = {
            text: "Clear Panes",
            action: function (e, k, f, l) {
                k.searchPanes.clearSelections();
            },
        };
        h.fn.dataTable.ext.buttons.searchPanes = {
            action: function (e, k, f, l) {
                e.stopPropagation();
                this.popover(l._panes.getNode(), { align: "dt-container" });
                l._panes.rebuild(void 0, !0);
            },
            config: {},
            init: function (e, k, f) {
                var l = new h.fn.dataTable.SearchPanes(
                        e,
                        h.extend(
                            {
                                filterChanged: function (n) {
                                    e.button(k).text(e.i18n("searchPanes.collapse", { 0: "SearchPanes", _: "SearchPanes (%d)" }, n));
                                },
                            },
                            f.config
                        )
                    ),
                    p = e.i18n("searchPanes.collapse", "SearchPanes", 0);
                e.button(k).text(p);
                f._panes = l;
            },
            text: "Search Panes",
        };
        h(b).on("preInit.dt.dtsp", function (e, k, f) {
            "dt" === e.namespace && (k.oInit.searchPanes || d.defaults.searchPanes) && (k._searchPanes || c(k, !0));
        });
        d.ext.feature.push({ cFeature: "P", fnInit: c });
        d.ext.features && d.ext.features.register("searchPanes", c);
    });
})();
