declare const _default: import("vue").DefineComponent<{
    pages: {
        type: NumberConstructor;
        default: number;
    };
    rangeSize: {
        type: NumberConstructor;
        default: number;
    };
    modelValue: {
        type: NumberConstructor;
        default: number;
    };
    activeColor: {
        type: StringConstructor;
        default: string;
    };
    hideFirstButton: {
        type: BooleanConstructor;
        default: boolean;
    };
    hideLastButton: {
        type: BooleanConstructor;
        default: boolean;
    };
}, {
    pagination: import("vue").ComputedRef<(number | null)[]>;
    updatePageHandler: (params: number) => void;
    isPrevControlsActive: import("vue").ComputedRef<boolean>;
    isNextControlsActive: import("vue").ComputedRef<boolean>;
    goToFirst: () => void;
    goToLast: () => void;
    goToPrev: () => void;
    goToNext: () => void;
}, unknown, {}, {}, import("vue").ComponentOptionsMixin, import("vue").ComponentOptionsMixin, "update:modelValue"[], "update:modelValue", import("vue").VNodeProps & import("vue").AllowedComponentProps & import("vue").ComponentCustomProps, Readonly<{
    pages: number;
    rangeSize: number;
    modelValue: number;
    activeColor: string;
    hideFirstButton: boolean;
    hideLastButton: boolean;
} & {}>, {
    pages: number;
    rangeSize: number;
    modelValue: number;
    activeColor: string;
    hideFirstButton: boolean;
    hideLastButton: boolean;
}>;
export default _default;
