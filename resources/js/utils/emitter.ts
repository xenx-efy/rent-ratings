import mitt from 'mitt';

export const emitter = mitt();
export const useBus = () => ({ emitter });
