import { readFile } from "node:fs/promises";
import { describe, expect, it } from "vitest";

describe("script du site", () => {
    it("active la classe js sur le document", async () => {
        const source = await readFile(
            new URL("../../src/scripts/main.js", import.meta.url),
            "utf8",
        );

        expect(source).toMatch(
            /document\.documentElement\.classList\.add\((["'])js\1\)/,
        );
    });
});
