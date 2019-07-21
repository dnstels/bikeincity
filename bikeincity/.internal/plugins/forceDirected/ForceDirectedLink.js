/**
 * ForceDirectedLink module.
 */
import * as tslib_1 from "tslib";
/**
 * ============================================================================
 * IMPORTS
 * ============================================================================
 * @hidden
 */
import { Sprite } from "../../core/Sprite";
import { registry } from "../../core/Registry";
import { InterfaceColorSet } from "../../core/utils/InterfaceColorSet";
import * as $path from "../../core/rendering/Path";
/**
 * ============================================================================
 * MAIN CLASS
 * ============================================================================
 * @hidden
 */
/**
 * A class that builds links between [[ForceDirectedNode]] elements.
 *
 * @see {@link IForceDirectedLinkEvents} for a list of available events
 * @see {@link IForceDirectedLinkAdapters} for a list of available Adapters
 * @since 4.3.8
 * @important
 */
var ForceDirectedLink = /** @class */ (function (_super) {
    tslib_1.__extends(ForceDirectedLink, _super);
    /**
     * Constructor
     */
    function ForceDirectedLink() {
        var _this = _super.call(this) || this;
        _this.className = "ForceDirectedLink";
        var interfaceColors = new InterfaceColorSet();
        _this.fillOpacity = 0;
        _this.strokeOpacity = 0.5;
        _this.stroke = interfaceColors.getFor("grid");
        _this.isMeasured = false;
        _this.nonScalingStroke = true;
        _this.interactionsEnabled = false;
        _this.distance = 1.5;
        _this.strength = 1;
        _this.applyTheme();
        return _this;
    }
    /**
     * Validates element:
     * * Triggers events
     * * Redraws the element
     *
     * @ignore Exclude from docs
     */
    ForceDirectedLink.prototype.validate = function () {
        _super.prototype.validate.call(this);
        var source = this.source;
        var target = this.target;
        if (source && target) {
            this.path = $path.moveTo({ x: source.pixelX, y: source.pixelY }) + $path.lineTo({ x: target.pixelX, y: target.pixelY });
            if (source.isHidden || target.isHidden || source.isHiding || target.isHiding) {
                this.hide();
            }
            else {
                this.show();
            }
        }
    };
    Object.defineProperty(ForceDirectedLink.prototype, "source", {
        /**
         * @return Source node
         */
        get: function () {
            return this._source;
        },
        /**
         * Source node - a node link starts from.
         *
         * @param  value  Source node
         */
        set: function (value) {
            if (value) {
                this._source = value;
                this._disposers.push(value.events.on("positionchanged", this.invalidate, this, false));
            }
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(ForceDirectedLink.prototype, "target", {
        /**
         * @return Target node
         */
        get: function () {
            return this._target;
        },
        /**
         * Target node - a node link ends at.
         *
         * @param  value  Target node
         */
        set: function (value) {
            if (value) {
                this._target = value;
                this._disposers.push(value.events.on("positionchanged", this.invalidate, this, false));
            }
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(ForceDirectedLink.prototype, "distance", {
        /**
         * @return Distance
         */
        get: function () {
            if (this.adapter.isEnabled("distance")) {
                return this.adapter.apply("distance", this.properties.distance);
            }
            return this.properties.distance;
        },
        /**
         * Distance between centers of source and target nodes.
         *
         * This is relative to the radii to sum of both source and target nodes.
         *
         * E.g. if this would be set to `1` both nodes would be touching each other.
         *
         * @default 1.5
         * @param  value  Distance
         */
        set: function (value) {
            this.setPropertyValue("distance", value);
        },
        enumerable: true,
        configurable: true
    });
    Object.defineProperty(ForceDirectedLink.prototype, "strength", {
        /**
         * @return Strength
         */
        get: function () {
            if (this.adapter.isEnabled("strength")) {
                return this.adapter.apply("strength", this.properties.strength);
            }
            return this.properties.strength;
        },
        /**
         * Relative "strength" of the traction between linked nodes.
         *
         * Available values: 0 to XX.
         *
         * The bigger the number, the more rigid the link and the less it will
         * stretch when node is dragged.
         *
         * Carefully with very big numbers: nodes and links might start behaving
         * quite "nerviously".
         *
         * @default 1
         * @param  value  Strength
         */
        set: function (value) {
            this.setPropertyValue("strength", value);
        },
        enumerable: true,
        configurable: true
    });
    return ForceDirectedLink;
}(Sprite));
export { ForceDirectedLink };
/**
 * Register class in system, so that it can be instantiated using its name from
 * anywhere.
 *
 * @ignore
 */
registry.registeredClasses["ForceDirectedLink"] = ForceDirectedLink;
//# sourceMappingURL=ForceDirectedLink.js.map