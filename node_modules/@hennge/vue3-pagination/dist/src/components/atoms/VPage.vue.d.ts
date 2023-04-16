declare const _default: import("vue").DefineComponent<{
    page: {
        type: NumberConstructor;
        default: null;
    };
    current: {
        type: NumberConstructor;
        default: number;
    };
    activeColor: {
        type: StringConstructor;
        default: string;
    };
}, {
    isActive: import("vue").ComputedRef<boolean>;
    clickHandler: () => void;
}, unknown, {}, {}, import("vue").ComponentOptionsMixin, import("vue").ComponentOptionsMixin, "update"[], "update", import("vue").VNodeProps & import("vue").AllowedComponentProps & import("vue").ComponentCustomProps, Readonly<{
    page: number;
    current: number;
    activeColor: string;
} & {}>, {
    page: number;
    current: number;
    activeColor: string;
}>;
export default _default;
