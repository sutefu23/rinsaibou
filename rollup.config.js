import { nodeResolve } from "@rollup/plugin-node-resolve"
import { babel } from "@rollup/plugin-babel"
import terser from "@rollup/plugin-terser"

const isProduction = process.env.NODE_ENV === "production"

export default {
  input: "src/js/theme.js",
  output: {
    file: "js/theme.js",
    format: "iife",
  },
  plugins: [nodeResolve(), babel(), isProduction && terser()],
}
