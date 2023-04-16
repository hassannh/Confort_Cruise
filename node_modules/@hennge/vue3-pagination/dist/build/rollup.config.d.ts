declare var _default: ({
    input: string;
    external: string[];
    output: {
        compact: boolean;
        format: string;
        file: string;
        exports?: undefined;
    };
    plugins: any[];
} | {
    input: string;
    external: string[];
    output: {
        compact: boolean;
        format: string;
        file: string;
        exports: string;
    };
    plugins: any[];
})[];
export default _default;
