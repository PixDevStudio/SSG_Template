import { describe, expect, it } from "vitest";

describe("script du site", () => {
    it("active la classe js sur le document", async () => {
        expect(document.documentElement.classList.contains("js")).toBe(false);

        await import("../../src/scripts/main.js");

        expect(document.documentElement.classList.contains("js")).toBe(true);
    });
});
