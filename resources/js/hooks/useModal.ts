import { emitter } from '@/utils/emitter';

export const useModal = () => {
  const openModal = () => {
    emitter.emit('open-modal');
  };
  const closeModal = () => {
    emitter.emit('close-modal');
  };
  return {
    openModal,
    closeModal,
  };
};
